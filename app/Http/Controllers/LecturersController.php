<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
class LecturersController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }
    private $departments= array('Computer Science','Chemistry','Mathematics','Animal Health','Hospitality');
 	private $rules = [
 		'name'=> 'required',
 		'email'=> 'required|email|unique:users',
 		'department'=>'required'
 	];
 	public function index()
 	{
 		$lecturers = User::where('role','lecturer')->where('status',1)->get();
 		return vieW('lecturers.index',['lecturers'=>$lecturers]);
 	}
 	public function edit(User $lecturer)
 	{
 		return view('lecturers.edit',['lecturer'=>$lecturer,'departments'=>$this->departments]);
 	}
 	public function update(User $lecturer,Request $request)
 	{
 		$this->rules['email'].=',email,'.$lecturer->email.',email';
    	$this->validate($request,$this->rules);

    	$lecturer->fill($request->all())->save();
    	Session::flash('flash_message', 'Lecturer details successfully updated!');

    	return redirect('lecturer');

 	}
 	public function delete(User $lecturer)
    {
    	$lecturer->delete();
    	Session::flash('flash_message', 'Lecturer successfully Deleted!');

    	return redirect('lecturer');
    }

    public function add()
    {
 		return view('lecturers.add',['departments'=>$this->departments]);
    	
    }
    public function store(Request $request)
    {
    	$this->rules['password']='required';
    	$this->validate($request, $this->rules);
    	 $input = $request->all();
    	 $input['password'] = bcrypt($input['password']);
    	 $input['role']= 'lecturer';
    	 $input['status']= 1;
    	 // dd($request->all());
	    User::create($input);
	    // User::create([
     //        'name' => $data['name'],
     //        'email' => $data['email'],
     //        'password' => bcrypt($data['password']),
     //    ]);

	    Session::flash('flash_message', 'Lecturer successfully added!');

	    return redirect()->back();
    }
    public function courses(User $lecturer)
    {
    	return view('lecturers.courses',['lecturer'=>$lecturer]);
    }
}
