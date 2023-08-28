<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuggestTrainingRequest;
use App\Models\Category;
use App\Models\TrainingNeed;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
   
    public function index(){
        $categories = Category::get(['id', 'name'])->pluck('name', 'id')->toArray();
        return view('frontend.user.training', compact('categories'));
    }

    public function store(SuggestTrainingRequest $request){
        TrainingNeed::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category,
            'title' => $request->title,
            'course_field' => $request->course_field,
            'course_topics' => $request->course_topics,
            'idea' => $request->idea,
        ]);

        return redirect()->back()->with(['success' => __('alerts.frontend.training_need_sent')]);
    }
}
