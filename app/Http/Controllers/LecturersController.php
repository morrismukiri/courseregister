<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class LecturersController extends Controller
{
 	public function index()
 	{
 		$lecturers = User:find()->where('role','lecturer');
 		return vieW('lecturers.index',['lecturers'=>$lecturers]);
 	}
}
