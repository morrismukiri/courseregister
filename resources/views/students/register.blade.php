@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <h2>Select</h2>
        <hr>
            <table class="table table-condensed table-hover table-striped dt" id="students">
            	<thead>
            		<tr>
            			<th>Code</th>
                        <th>Name</th>
                        <th>Lecturer</th>
            			<th>Capacity</th>
            			<th>Enroll</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($courses as $course)
            		<tr>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->Lecturer->name }}</td>
                        <td>{{ $course->capacity }}</td>
                        <td><a href="{{ url('/courses/register/'. Auth::user()->id.'/'. $course->id) }}" class="btn btn-success"> <i class="glyphicon glyphicon-ok"> Enroll</a></td>
            		</tr>
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
