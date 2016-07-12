<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'code', 'name','lecturer','capacity'
    ];

    public function Lecturer()
    {
    	return $this->belongsTo(\App\User::class,'lecturer','id');
    }
    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
