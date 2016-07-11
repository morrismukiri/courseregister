<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\course;
use Session;

class CourseController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$courses = course::all();
        return view('course.show',['courses'=>$courses]);
        // return "courses below";
    }
    public function add()
    {
    	$lecturers = [
    	['id'=>1,'name'=>'F. Muthengi','department'=>'Computer Science'],
    	['id'=>2,'name'=>'E. Gakii','department'=>'Computer Science']
    	];
    	$lecs= json_decode(json_encode($lecturers), FALSE);;
    	return view('course.form',['lecturers'=>$lecs]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'code'=>'required|unique:courses',
    		'capacity'=>'required|numeric',
    		'lecturer'=>'required'
    	]);
    	 $input = $request->all();
    	 // dd($request->all());
	    course::create($input);

	    Session::flash('flash_message', 'Course successfully added!');

	    return redirect()->back();
    }
}
