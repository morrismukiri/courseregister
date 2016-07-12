<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\course;
use App\CourseRegister;
use Session;
use Auth;
class StudentsController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }
    private $departments= array('Computer Science','Chemistry','Mathematics','Animal Health','Hospitality');
 	private $rules = [
 		'name'=> 'required',
 		'registration'=> 'required|unique:users',
 		'email'=> 'required|email|unique:users',
 		'department'=>'required'
 	];
 	public function index()
 	{
 		$students = User::where('role','student')->where('status',1)->get();
 		return vieW('students.index',['students'=>$students]);
 	}
 	public function edit(User $student)
 	{
 		return view('students.edit',['student'=>$student,'departments'=>$this->departments]);
 	}
 	public function update(User $student,Request $request)
 	{
 		$this->rules['email'].=',email,'.$student->email.',email';
 		$this->rules['registration'].=',registration,'.$student->registration.',registration';
    	$this->validate($request,$this->rules);

    	$student->fill($request->all())->save();
    	Session::flash('flash_message', 'Student details successfully updated!');

    	return redirect('student');

 	}
 	public function delete(User $student)
    {
    	$student->delete();
    	Session::flash('flash_message', 'Student successfully Deleted!');

    	return redirect('student');
    }

    public function add()
    {
 		return view('students.add',['departments'=>$this->departments]);
    	
    }
    public function store(Request $request)
    {
    	$this->rules['password']='required';
    	$this->validate($request, $this->rules);
    	 $input = $request->all();
    	 $input['password'] = bcrypt($input['password']);
    	 $input['role']= 'student';
    	 $input['status']= 1;
    	 // dd($request->all());
	    User::create($input);
	    // User::create([
     //        'name' => $data['name'],
     //        'email' => $data['email'],
     //        'password' => bcrypt($data['password']),
     //    ]);

	    Session::flash('flash_message', 'Student successfully added!');

	    return redirect()->back();
    }
    public function courses(User $student)
    {
        // dd($student->RegisteredCourses);
    	return view('students.courses',['student'=>$student]);
    }

    public function listCourses()
    {
        $courses= course::all();
        return view('students.register',['courses'=>$courses]);
    }
    public function register($student, $course)
    {
        // dd(Auth::user()->id);
    	CourseRegister::insert([
            'student'=>$student,
            'course'=>$course
            ]);
    	return redirect('/student/courses/'.Auth::user()->id);
    }
}
