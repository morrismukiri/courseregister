@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="course/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add	</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="courses">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Code</th>
            			<th>Lecturer</th>
            			<th>Capacity</th>
            			<th>Action</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($courses as $course)
            		<tr>
            			<td>{{ $course->name }}</td>
            			<td>{{ $course->code }}</td>
            			<td>{{ $course->Lecturer->name }}</td>
            			<td>{{ $course->capacity }}</td>
            			<td>
            			<a href="course/edit/{{ $course->id }}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a> |
            			<a href="course/delete/{{ $course->id }}" class="btn btn-danger delete" ><i class="glyphicon glyphicon-trash"></i> Delete</a>
            			 </td>
            		</tr>
            		
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
