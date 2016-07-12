<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegister extends Model
{
     protected $fillable = [
        'student', 'course'
    ];
    public function Student()
    {
    	return $this->belongsTo(\App\User::class,'student','id');
    }
    public function Course()
    {
    	return $this->belongsTo(\App\course::class,'course','id');
    }
}
