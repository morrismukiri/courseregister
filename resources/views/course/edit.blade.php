@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('course/edit/'.$course->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$course->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code',$course->code) }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Capacity</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control" name="capacity" value="{{ old('capacity',$course->capacity) }}">

                                @if ($errors->has('capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('lecturer') ? ' has-error' : '' }}">
                            <label for="lecturer" class="col-md-4 control-label">Lecturer</label>

                            <div class="col-md-6">
                                <select name="lecturer" id="lecturer" class="form-control selectpicker" data-live-search="true">
										@foreach($lecturers as $lecturer)
												<option value="{{ $lecturer->id }}" @if (old('lecturer',$course->lecturer) == $lecturer->id ) selected="selected" @endif >{{ $lecturer->name }}</option>
										@endforeach
                                </select>

                                @if ($errors->has('lecturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lecturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                   Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>


@endsection