<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Course;
use App\Models\Order;
use App\Models\stripe\StripePlan;
use App\Models\stripe\SubscribeBundle;
use App\Models\stripe\SubscribeCourse;
use App\Models\stripe\Subscription;
use App\Models\stripe\UserCourses;
use Illuminate\Http\Request;
use ManagesCustomer;
class SubscriptionController extends Controller
{    public function plans()
    {
        $plans = StripePlan::get();
        return view('frontend.subscription.plans', compact('plans'));
    }

    public function showForm(StripePlan $plan)
    {
        $intent = auth()->user()->createSetupIntent();
        return view('frontend.subscription.form', compact('plan', 'intent'));
    }

    /**
     * Process the form
     */
    public function subscribe(Request $request, StripePlan $plan)
    {
        $paymentMethod = $request->paymentMethod;
        // grab the user

        $user = $request->user();
        $address = [
            "city" => $request->city,
            "country" => $request->country,
            "line1" => $request->address,
            "line2" => null,
            "postal_code" => $request->postal_code,
            "state" => $request->state,
        ];

        $user->createOrGetStripeCustomer();

        $user->updateStripeCustomer([
            'email' => $request->stripeEmail,
            "address" => $address
        ]);

        // create the subscription
        try {
           $user->newSubscription('default', $plan->plan_id)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->plan_id = $plan->id;
            $order->reference_no = str_random(8);
            $order->amount = $plan->amount;
            $order->status = 1;
            $order->payment_type = 0;
            $order->order_type = 1;
            $order->save();
            if(!empty($order->id)){
                $this->checkSubscriptionCourseOrBundle($order,$plan->id);
            }
            \Session::flash('success', trans('labels.subscription.done'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage() . ' for subscription plan ' .$plan->name. ' User Name: '.$user->name.' Id:' .$user->id);
            return redirect()->route('subscription.plans')->withErrors('Error creating subscription.');
        }
        return redirect()->route('subscription.status');
    }

    private function checkSubscriptionCourseOrBundle($order,$planId)
    {

        if(!empty($planId) && $planId!=0 && !empty($order))
        {
            $planData = StripePlan::where('id','=',$planId)->first();
            $userCourse = UserCourses::where('plan_id',$planId)->first();
            //course check
            $courses = SubscribeCourse::where('stripe_id','=',$planId)->get();

            if (is_null($userCourse)){
                $expire_at = "";
            }else{
                $expire_at = $userCourse->expire_at;
            }
            if($courses && count($courses) > 0)
            {
                foreach($courses as $course)
                {
                    if ($course->course_id) {
                        $type = Course::class;
                        $id = $course->course_id;
                    }
                   $returnDate = checkExistingUserSubcribtionDate($planData->interval,$planData->expire,$expire_at);
                   $courseInsert = new UserCourses();
                   $courseInsert->user_id = $order->user_id;
                   $courseInsert->plan_id = $planId;
                   $courseInsert->course_id = $id;
                   $courseInsert->expire_at = $returnDate;
                   $courseInsert->save();


                    $order->items()->create([
                        'item_id' => $id,
                        'item_type' => $type,
                        'price' => 0,
                        'type' => 1
                    ]);
                }

            }

            //bundle check

            $bundles = SubscribeBundle::where('stripe_id','=',$planId)->get();
            if($bundles && count($bundles) > 0)
            {
                foreach($bundles as $bundle)
                {
                    if ($bundle->bundle_id) {
                        $type = Bundle::class;
                        $id = $bundle->bundle_id;
                    }
                        $returnDate = checkExistingUserSubcribtionDate($planData->interval,$planData->expire,$expire_at);
                        UserCourses::create([
                            "user_id"=>$order->user_id,
                            "plan_id"=>$planId,
                            "bundle_id"=>$id,
                            "expire_at"=>$returnDate,
                        ]);
                    $order->items()->create([
                        'item_id' => $id,
                        'item_type' => $type,
                        'price' => 0,
                        'type' => 1
                    ]);
                }
            }

            foreach ($order->items as $orderItem)
            {
                // Bundle Entries
                if ($orderItem->item_type == Bundle::class) {
                    foreach ($orderItem->item->courses as $course) {
                        $course->students()->attach($order->user_id);
                    }
                }
                $orderItem->item->students()->attach($order->user_id);
            }
        }
    }

    /**
     * Update the subscription
     */
    public function updateSubscription(Request $request, StripePlan $plan)
    {
        $user = $request->user();
        // if a user is cancelled
        if ($user->subscribed('default') && $user->subscription('default')->onGracePeriod()) {

            if ($user->onPlan($plan->plan_id)) {
                // resume the plan
                $user->subscription('default')->resume();
            } else {
                // resume and switch plan
                $user->subscription('default')->resume()->swap($plan->plan_id);
            }

            // if not cancelled, and switch
        }
//        else if(auth()->user()->subscription('default')->ends_at == null){
//                // if already plan purchase then by another plan generate new subscription
//            //$this->subscribe($request,$plan);
//        }
        else {
            // change the plan
            $user->subscription('default')->swap($plan->plan_id);
        }


        \Session::flash('success', trans('labels.subscription.update'));
        return redirect()->route('subscription.status');
    }

    private function checkQuantity($isQuantity)
    {
        if($isQuantity == 0 || $isQuantity == 99){
            return false;
        }
        return true;
    }

    public function status()
    {
        return view('frontend.subscription.status');
    }

    public function courseSubscribed(Request $request)
    {
        $user  = $request->user();

        if($user->subscription()->ended()){
            return redirect()->back()->withDanger(trans('alerts.frontend.course.subscription_plan_expired'));
        }

        if(!$user->subscription()->cancelled()){

            if($user->subscription()->active()){
                $plan = $this->getPlan($user->subscription()->stripe_plan);
                if($request->course_id){
                    if($plan->course == 99){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_course_not_access'));
                    }
                    if($plan->course != 0 && $user->subscribedCourse()->count() >= $plan->course){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_course_limit_over'));
                    }
                }else{
                    if($plan->bundle == 99){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_bundle_not_access'));
                    }
                    if($plan->bundle != 0 && $user->subscribedBundles()->count() >= $plan->bundle){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_bundle_limit_over'));
                    }
                }

                $this->subscribeBundleOrCourse($request);

                return redirect()->route('admin.dashboard')->withFlashSuccess($request->course_id ? trans('alerts.frontend.course.sub_course_success') : trans('alerts.frontend.course.sub_bundle_success'));
            }
        }else{
            return redirect()->back()->withDanger(trans('alerts.frontend.course.subscription_plan_cancelled'));
        }
    }

    private function getPlan($planId)
    {
        return StripePlan::where('plan_id', $planId)->firstorfail();
    }

    private function subscribeBundleOrCourse(Request $request)
    {

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->reference_no = str_random(8);
        $order->amount = 0;
        $order->status = 1;
        $order->payment_type = 0;
        $order->order_type = 1;
        $order->save();
        //Getting and Adding items
        if ($request->course_id) {
            $type = Course::class;
            $id = $request->course_id;
        } else {
            $type = Bundle::class;
            $id = $request->bundle_id;

        }
        $order->items()->create([
            'item_id' => $id,
            'item_type' => $type,
            'price' => 0,
            'type' => 1
        ]);

        foreach ($order->items as $orderItem) {
            //Bundle Entries
            if ($orderItem->item_type == Bundle::class) {
                foreach ($orderItem->item->courses as $course) {
                    $course->students()->attach($order->user_id);
                }
            }
            $orderItem->item->students()->attach($order->user_id);
        }
    }

}


