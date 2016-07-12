<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\course;
use Session;
use App\User;

class CourseController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    private $rules = [
    		'name'=>'required',
    		'code'=>'required|unique:courses',
    		'capacity'=>'required|numeric',
    		'lecturer'=>'required'
    	];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$courses = course::all();//Ensure Lecturer sub-object is Capital Lecturer
    	
        return view('course.show',['courses'=>$courses]);
       
    }
    public function add()
    {
    	
    	$lecturers= User::where('role','lecturer')->where('status',1)->get();
    	return view('course.form',['lecturers'=>$lecturers]);
    }
    public function store(Request $request)
    {
    	$this->validate($request, $this->rules);
    	 $input = $request->all();
    	 // dd($request->all());
	    course::create($input);

	    Session::flash('flash_message', 'Course successfully added!');

	    return redirect()->back();
    }
    public function edit(course $course)
    {
    	$lecturers= User::where('role','lecturer')->where('status',1)->get();
    	return view('course.edit',['course'=>$course,'lecturers'=>$lecturers]);
    }
    public function update(course $course, Request $request)
    {
    	// dd($this->rules);
    	$this->rules['code'].=',code,'.$course->code.',code';
    	$this->validate($request,$this->rules);

    	$course->fill($request->all())->save();
    	Session::flash('flash_message', 'Course successfully updated!');

    	return redirect('course');

    	
    }
    public function delete(course $course)
    {
    	$course->delete();
    	Session::flash('flash_message', '	Course successfully Deleted!');

    	return redirect('course');
    }
}
