@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <h2>List of Courses Assigned to me</h2>
        <hr>
            <table class="table table-condensed table-hover table-striped dt" id="lecturers">
            	<thead>
            		<tr>
            			<th>Code</th>
                        <th>Name</th>
            			<th>Capacity</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($lecturer->courses as $course)
            		<tr>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->capacity }}</td>
            			
            			
            		</tr>
            		
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
