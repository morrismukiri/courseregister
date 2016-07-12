@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="student/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add	</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="students">
            	<thead>
            		<tr>
                        <th>Registration</th>
            			<th>Name</th>
            			<th>Department</th>
            			<th>Units</th>
            			<th>Action</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($students as $student)
            		<tr>
                        <td>{{ $student->registration }}</td>
            			<td>{{ $student->name }}</td>
            			<td>{{ $student->department }}</td>
            			<td>{{ $student->RegisteredCourses->count() }}</td>
            			
            			<td>
            			<a href="student/edit/{{ $student->id }}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a> |
            			<a href="student/delete/{{ $student->id }}" class="btn btn-danger delete" ><i class="glyphicon glyphicon-trash"></i> Delete</a>
            			 </td>
            		</tr>
            		
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
