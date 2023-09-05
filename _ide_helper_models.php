<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Auth{
/**
 * Class PasswordHistory.
 *
 * @property int $id
 * @property int $user_id
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereUserId($value)
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Role.
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $action_buttons
 * @property-read string $delete_button
 * @property-read string $edit_button
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class SocialAccount.
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAccount whereUserId($value)
 */
	class SocialAccount extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class User.
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $dob
 * @property string|null $phone
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $city
 * @property string|null $pincode
 * @property string|null $state
 * @property string|null $country
 * @property string $avatar_type
 * @property string|null $avatar_location
 * @property string|null $password
 * @property string|null $password_changed_at
 * @property bool $active
 * @property string|null $confirmation_code
 * @property bool $confirmed
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property string|null $academic_rank
 * @property string|null $nationality
 * @property string|null $user_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bundle[] $bundles
 * @property-read int|null $bundles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Certificate[] $certificates
 * @property-read int|null $certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChapterStudent[] $chapters
 * @property-read int|null $chapters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read \App\Models\UserDoc|null $docs
 * @property-read \App\Models\E3tmadProfile|null $e3tmadProfile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Earning[] $earnings
 * @property-read int|null $earnings_count
 * @property-read string $action_buttons
 * @property-read string $change_password_button
 * @property-read string $clear_session_button
 * @property-read string $confirmed_button
 * @property-read string $confirmed_label
 * @property-read string $delete_button
 * @property-read string $delete_permanently_button
 * @property-read string $edit_button
 * @property-read string $full_name
 * @property-read mixed $image
 * @property-read string $login_as_button
 * @property-read string $name
 * @property-read string $permissions_label
 * @property-read mixed $picture
 * @property-read string $restore_button
 * @property-read string $roles_label
 * @property-read string $show_button
 * @property-read string $social_buttons
 * @property-read string $status_button
 * @property-read string $status_label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LessonSlotBooking[] $lessonSlotBookings
 * @property-read int|null $lesson_slot_bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Lexx\ChatMessenger\Models\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
 * @property-read int|null $order_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Lexx\ChatMessenger\Models\Participant[] $participants
 * @property-read int|null $participants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\SocialAccount[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Session[] $sessions
 * @property-read int|null $sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \App\Models\TeacherProfile|null $teacherProfile
 * @property-read \Illuminate\Database\Eloquent\Collection|\Lexx\ChatMessenger\Models\Thread[] $threads
 * @property-read int|null $threads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WishList[] $wishlist
 * @property-read int|null $wishlist_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Withdraw[] $withdraws
 * @property-read int|null $withdraws_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active(bool $status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|User confirmed(bool $confirmed = true)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User uuid($uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAcademicRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string|null $slug
 * @property string $content
 * @property string|null $image
 * @property int $views
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Auth\User $author
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogComment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $blog_author
 * @property-read mixed $blog_category
 * @property-read mixed $blog_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereViews($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlogComment
 *
 * @property int $id
 * @property int $blog_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Blog|null $blog
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|BlogComment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogComment withoutTrashed()
 */
	class BlogComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bundle
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $user_id
 * @property string $title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $price
 * @property string|null $course_image
 * @property string|null $start_date
 * @property int|null $featured
 * @property int|null $trending
 * @property int|null $popular
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int|null $published
 * @property int|null $free
 * @property string|null $expire_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\stripe\UserCourses|null $bundleUser
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read mixed $image
 * @property-read mixed $rating
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $item
 * @property-read int|null $item_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $students
 * @property-read int|null $students_count
 * @property-read \App\Models\Auth\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle canDisableBundle()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle ofAuthor()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle ofTeacher()
 * @method static \Illuminate\Database\Query\Builder|Bundle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereCourseImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle wherePopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereTrending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundle whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Bundle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bundle withoutTrashed()
 */
	class Bundle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BundleCourses
 *
 * @property int $bundle_id
 * @property int $course_id
 * @method static \Illuminate\Database\Eloquent\Builder|BundleCourses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BundleCourses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BundleCourses query()
 * @method static \Illuminate\Database\Eloquent\Builder|BundleCourses whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BundleCourses whereCourseId($value)
 */
	class BundleCourses extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $icon
 * @property string|null $image
 * @property int $status 0 - disabled, 1 - enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bundle[] $bundles
 * @property-read int|null $bundles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq[] $faqs
 * @property-read int|null $faqs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Certificate
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property int|null $course_id
 * @property string|null $url
 * @property int $status 1-Generated 0-Not Generated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course|null $course
 * @property-read mixed $certificate_link
 * @property-read \App\Models\Auth\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUserId($value)
 */
	class Certificate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChapterStudent
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property int|null $user_id
 * @property int|null $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChapterStudent whereUserId($value)
 */
	class ChapterStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChatterCategory
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $order
 * @property string $name
 * @property string $color
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatterCategory whereUpdatedAt($value)
 */
	class ChatterCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereValue($value)
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int|null $number
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $code
 * @property int $type 1 - Discount, 2 - Flat Amount
 * @property float $amount Percentage or Amount
 * @property float $min_price Minimum price to allow coupons
 * @property string|null $expires_at
 * @property int $per_user_limit 0 - Unlimited
 * @property int $status 0 - Disabled, 1 - Enabled, 2 - Expired
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $adver_perce
 * @property string|null $adver_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereAdverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereAdverPerce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePerUserLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Course
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property text $description
 * @property decimal $price
 * @property string $course_image
 * @property string $start_date
 * @property tinyInteger $published
 * @property int $id
 * @property int|null $category_id
 * @property string|null $strike
 * @property int|null $featured
 * @property int|null $trending
 * @property int|null $popular
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int|null $free
 * @property string|null $expire_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $e3tmad_id
 * @property int $bag_type
 * @property string $cert_price
 * @property string|null $cert_image
 * @property array|null $cert_data
 * @property string|null $level
 * @property string|null $voltage
 * @property string|null $duration
 * @property string|null $recording_url
 * @property string|null $goals
 * @property string|null $requirements
 * @property string|null $outputs
 * @property string|null $target_group
 * @property string|null $sponsor_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bundle[] $bundles
 * @property-read int|null $bundles_count
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Certificate[] $certificates
 * @property-read int|null $certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseTimeline[] $courseTimeline
 * @property-read int|null $course_timeline_count
 * @property-read \App\Models\stripe\UserCourses|null $courseUser
 * @property-read \App\Models\Auth\User|null $e3tmad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $e3tmads
 * @property-read int|null $e3tmads_count
 * @property-read mixed $bag_type_text
 * @property-read mixed $course_page_strike_price
 * @property-read mixed $image
 * @property-read mixed $is_expired
 * @property-read mixed $rating
 * @property-read mixed $strike_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $item
 * @property-read int|null $item_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \App\Models\Media|null $mediaVideo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $orderItem
 * @property-read int|null $order_item_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $publishedLessons
 * @property-read int|null $published_lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $teachers
 * @property-read int|null $teachers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Test[] $tests
 * @property-read int|null $tests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WishList[] $wishlist
 * @property-read int|null $wishlist_count
 * @method static \Illuminate\Database\Eloquent\Builder|Course canDisableCourse()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course ofE3tmad()
 * @method static \Illuminate\Database\Eloquent\Builder|Course ofTeacher()
 * @method static \Illuminate\Database\Query\Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereBagType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCertData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCertImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCertPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereE3tmadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereOutputs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereRecordingUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSponsorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStrike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTargetGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTrending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereVoltage($value)
 * @method static \Illuminate\Database\Query\Builder|Course withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Course withoutTrashed()
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CourseTimeline
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property int $course_id
 * @property int $sequence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTimeline whereUpdatedAt($value)
 */
	class CourseTimeline extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\E3tmadProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $facebook_link
 * @property string|null $twitter_link
 * @property string|null $linkedin_link
 * @property string $payment_method paypal,bank
 * @property array $payment_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|E3tmadProfile whereUserId($value)
 */
	class E3tmadProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Earning
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $course_id
 * @property int|null $user_id
 * @property string $course_price
 * @property string $amount
 * @property string $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Course|null $course
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Auth\User|null $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|Earning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Earning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Earning query()
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereCoursePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Earning whereUserId($value)
 */
	class Earning extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $question
 * @property string $answer
 * @property int $status 0 - disbaled, 1 - enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Flagemail
 *
 * @property int $id
 * @property int $course_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flagemail whereUpdatedAt($value)
 */
	class Flagemail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUserId($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Lesson
 *
 * @package App
 * // * @property string $course
 * @property string $title
 * @property string $slug
 * @property string $lesson_image
 * @property text $short_text
 * @property text $full_text
 * @property integer $position
 * @property string $downloadable_files
 * @property tinyInteger $free_lesson
 * @property tinyInteger $published
 * @property int $id
 * @property int|null $course_id
 * @property int $live_lesson
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChapterStudent[] $chapterStudents
 * @property-read int|null $chapter_students_count
 * @property-read \App\Models\Course|null $course
 * @property-read \App\Models\CourseTimeline|null $courseTimeline
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $downloadableMedia
 * @property-read int|null $downloadable_media_count
 * @property-read mixed $image
 * @property-read mixed $lesson_readtime
 * @property-read \App\Models\LessonSlotBooking|null $lessonSlotBooking
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LiveLessonSlot[] $liveLessonSlots
 * @property-read int|null $live_lesson_slots_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Media|null $mediaAudio
 * @property-read \App\Models\Media|null $mediaPDF
 * @property-read \App\Models\Media|null $mediaVideo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $students
 * @property-read int|null $students_count
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson ofTeacher()
 * @method static \Illuminate\Database\Query\Builder|Lesson onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereFreeLesson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereFullText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereLessonImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereLiveLesson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereShortText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Lesson withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Lesson withoutTrashed()
 */
	class Lesson extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LessonSlotBooking
 *
 * @property int $id
 * @property int|null $live_lesson_slot_id
 * @property int|null $lesson_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson|null $lesson
 * @property-read \App\Models\LiveLessonSlot|null $liveLessonSlot
 * @property-read \App\Models\Auth\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking query()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereLiveLessonSlotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonSlotBooking whereUserId($value)
 */
	class LessonSlotBooking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LiveLessonSlot
 *
 * @property int $id
 * @property int|null $lesson_id
 * @property string $meeting_id
 * @property string $topic
 * @property string $description agenda
 * @property \Illuminate\Support\Carbon $start_at
 * @property int $duration minutes
 * @property string $password meeting password
 * @property int|null $student_limit
 * @property string $start_url
 * @property string $join_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Lesson|null $lesson
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LessonSlotBooking[] $lessonSlotBookings
 * @property-read int|null $lesson_slot_bookings_count
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot newQuery()
 * @method static \Illuminate\Database\Query\Builder|LiveLessonSlot onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereJoinUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereMeetingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereStartUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereStudentLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveLessonSlot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|LiveLessonSlot withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LiveLessonSlot withoutTrashed()
 */
	class LiveLessonSlot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Locale
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $short_name
 * @property string $display_type ltr - Left to right, rtl - Right to Left
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDisplayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUpdatedAt($value)
 */
	class Locale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string $name
 * @property string|null $url
 * @property string|null $type
 * @property string $file_name
 * @property int $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Newslatters
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters query()
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newslatters whereUpdatedAt($value)
 */
	class Newslatters extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OauthClient
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $secret
 * @property string|null $provider
 * @property string $redirect
 * @property int $personal_access_client
 * @property int $password_client
 * @property int $revoked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereUserId($value)
 */
	class OauthClient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $plan_id
 * @property string $reference_no
 * @property float $amount
 * @property int $payment_type 1-stripe/card, 2 - Paypal, 3 - Offline, 4 - Instamojo, 5 - RazorPay, 6 - CashFree, 7 - PayUMoney
 * @property int $status 0 - in progress, 1 - Completed
 * @property string|null $transaction_id
 * @property string|null $remarks
 * @property int $order_type 0=WebPayment, 1=subscribe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $coupon_id
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read \App\Models\Invoice|null $invoice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\Models\stripe\StripePlan|null $plan
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property string|null $item_type
 * @property int $item_id
 * @property float $price
 * @property string $cert_price
 * @property int $type 0=WebPayment, 1=subscribe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $course
 * @property-read int|null $course_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $item
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCertPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $image
 * @property int $sidebar
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property int|null $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $page_image
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Query\Builder|Page onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSidebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Page withoutTrashed()
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Question
 *
 * @package App
 * @property text $question
 * @property string $question_image
 * @property integer $score
 * @property int $id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuestionsOption[] $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Test[] $tests
 * @property-read int|null $tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Query\Builder|Question onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Question withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Question withoutTrashed()
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * Class QuestionsOption
 *
 * @package App
 * @property string $question
 * @property text $option_text
 * @property tinyInteger $correct
 * @property int $id
 * @property int|null $question_id
 * @property string|null $explanation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption newQuery()
 * @method static \Illuminate\Database\Query\Builder|QuestionsOption onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereOptionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionsOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|QuestionsOption withTrashed()
 * @method static \Illuminate\Database\Query\Builder|QuestionsOption withoutTrashed()
 */
	class QuestionsOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reason
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $icon
 * @property int $status 0 - disabled, 1 - enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reason query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reason whereUpdatedAt($value)
 */
	class Reason extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $user_id
 * @property int $reviewable_id
 * @property string $reviewable_type
 * @property int|null $rating
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $reviewable
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReviewableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReviewableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $name
 * @property string|null $content
 * @property string|null $bg_image
 * @property int|null $overlay
 * @property int $sequence
 * @property int $status 1 - enabled, 0 - disabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBgImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOverlay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sponsor
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $link
 * @property int $status 0 - disabled, 1 - enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUpdatedAt($value)
 */
	class Sponsor extends \Eloquent {}
}

namespace App\Models\System{
/**
 * Class Session
 * package App.
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserId($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tax
 *
 * @property int $id
 * @property string $name
 * @property float $rate
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereUpdatedAt($value)
 */
	class Tax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TeacherProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $facebook_link
 * @property string|null $twitter_link
 * @property string|null $linkedin_link
 * @property string $payment_method paypal,bank
 * @property array $payment_details
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Auth\User|null $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherProfile whereUserId($value)
 */
	class TeacherProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Test
 *
 * @package App
 * @property string $course
 * @property string $lesson
 * @property string $title
 * @property text $description
 * @property tinyInteger $published
 * @property int $id
 * @property int|null $course_id
 * @property int|null $lesson_id
 * @property int|null $passing_score
 * @property int $retest_number
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChapterStudent[] $chapterStudents
 * @property-read int|null $chapter_students_count
 * @property-read \App\Models\CourseTimeline|null $courseTimeline
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Query\Builder|Test onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test wherePassingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereRetestNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Test withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Test withoutTrashed()
 */
	class Test extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Testimonial
 *
 * @property int $id
 * @property string $name
 * @property string|null $occupation
 * @property string $content
 * @property int $status 0 - disabled, 1 - enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TestsResult
 *
 * @property int $id
 * @property int|null $test_id
 * @property int|null $user_id
 * @property int $test_result
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TestsResultsAnswer[] $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereTestResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResult whereUserId($value)
 */
	class TestsResult extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TestsResultsAnswer
 *
 * @property int $id
 * @property int|null $tests_result_id
 * @property int|null $question_id
 * @property int|null $option_id
 * @property int $correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\QuestionsOption|null $option
 * @property-read \App\Models\Question|null $question
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereTestsResultId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestsResultsAnswer whereUpdatedAt($value)
 */
	class TestsResultsAnswer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TrainingNeed
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $course_field
 * @property string $course_topics
 * @property string $idea
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed query()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereCourseField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereCourseTopics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereIdea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingNeed whereUserId($value)
 */
	class TrainingNeed extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserDoc
 *
 * @property int $user_id
 * @property string|null $personal_photo
 * @property string|null $passport_photo
 * @property string|null $academic_degree_photo
 * @property string|null $cv
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereAcademicDegreePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc wherePassportPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc wherePersonalPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereUserId($value)
 */
	class UserDoc extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VideoProgress
 *
 * @property int $id
 * @property int $media_id
 * @property int $user_id
 * @property float $duration
 * @property float $progress
 * @property int $complete 0.Pending 1.Complete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress query()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoProgress whereUserId($value)
 */
	class VideoProgress extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WishList
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|WishList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList query()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereUserId($value)
 */
	class WishList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Withdraw
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property int|null $payment_type 0=Bank, 1=Paypal,2=offline
 * @property int $status 0=pending,1=accepted,2=rejected
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Auth\User $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUserId($value)
 */
	class Withdraw extends \Eloquent {}
}

namespace App\Models\stripe{
/**
 * App\Models\stripe\StripePlan
 *
 * @property int $id
 * @property string $product
 * @property string $plan_id
 * @property string $name
 * @property string|null $description
 * @property string $amount
 * @property string $currency
 * @property string|null $expire
 * @property string|null $recurring
 * @property string $interval
 * @property int|null $course
 * @property int|null $bundle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\stripe\SubscribeBundle[] $subcribeBundle
 * @property-read int|null $subcribe_bundle_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\stripe\SubscribeCourse[] $subcribeCourses
 * @property-read int|null $subcribe_courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan newQuery()
 * @method static \Illuminate\Database\Query\Builder|StripePlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereBundle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripePlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|StripePlan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StripePlan withoutTrashed()
 */
	class StripePlan extends \Eloquent {}
}

namespace App\Models\stripe{
/**
 * App\Models\stripe\SubscribeBundle
 *
 * @property int $id
 * @property int $stripe_id
 * @property int $bundle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bundle|null $bundle
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeBundle whereUpdatedAt($value)
 */
	class SubscribeBundle extends \Eloquent {}
}

namespace App\Models\stripe{
/**
 * App\Models\stripe\SubscribeCourse
 *
 * @property int $id
 * @property int $stripe_id
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course|null $course
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscribeCourse whereUpdatedAt($value)
 */
	class SubscribeCourse extends \Eloquent {}
}

namespace App\Models\stripe{
/**
 * App\Models\stripe\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $stripe_id
 * @property string $stripe_status
 * @property string|null $stripe_plan
 * @property int|null $quantity
 * @property string|null $trial_ends_at
 * @property string|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models\stripe{
/**
 * App\Models\stripe\UserCourses
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $plan_id
 * @property string|null $course_id
 * @property string|null $bundle_id
 * @property string|null $expire_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourses whereUserId($value)
 */
	class UserCourses extends \Eloquent {}
}

