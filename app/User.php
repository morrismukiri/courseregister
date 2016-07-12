<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','registration','department','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function courses()
    {
        return $this->hasMany(\App\course::class,'lecturer','id');
    }
    public function RegisteredCourses()
    {
        return $this->hasMany(\App\CourseRegister::class,'student','id');
    }
}
