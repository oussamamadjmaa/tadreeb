<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'user_id', 'attendance_dates'];

    protected $casts = [
        'attendance_dates' => 'array'
    ];

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
