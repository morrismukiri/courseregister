@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="lecturer/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add	</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="lecturers">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Department</th>
            			<th>Units</th>
            			<th>Action</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($lecturers as $lecturer)
            		<tr>
            			<td>{{ $lecturer->name }}</td>
            			<td>{{ $lecturer->department }}</td>
            			<td>{{ $lecturer->courses->count() }}</td>
            			
            			<td>
            			<a href="lecturer/edit/{{ $lecturer->id }}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a> |
            			<a href="lecturer/delete/{{ $lecturer->id }}" class="btn btn-danger delete" ><i class="glyphicon glyphicon-trash"></i> Delete</a>
            			 </td>
            		</tr>
            		
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
