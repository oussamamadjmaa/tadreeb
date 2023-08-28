<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class UserDoc extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','personal_photo', 'passport_photo', 'academic_degree_photo', 'cv'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getPersonalPhotoAttribute($val){
        return $val ? url('storage/'.$val) : NULL;
    }

    public function getPassportPhotoAttribute($val){
        return $val ? url('storage/'.$val) : NULL;
    }

    public function getAcademicDegreePhotoAttribute($val){
        return $val ? url('storage/'.$val) : NULL;
    }

    public function getCvAttribute($val){
        return $val ? url('storage/'.$val) : NULL;
    }
}
