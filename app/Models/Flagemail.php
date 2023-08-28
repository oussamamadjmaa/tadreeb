<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flagemail extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'email'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
