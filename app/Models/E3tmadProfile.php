<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E3tmadProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'facebook_link', 'twitter_link', 'linkedin_link', 'payment_method', 'payment_details'
    ];

    protected $casts = [
        'payment_details' => 'object'
    ];


    /**
    * Get the teacher profile that owns the user.
    */
    public function e3tmad(){
        return $this->belongsTo(User::class);
    }
}
