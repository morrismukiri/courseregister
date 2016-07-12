@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Lecturer Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('lecturer/edit/'.$lecturer->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$lecturer->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email',$lecturer->email) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
	                        <label for="department" class="col-md-4 control-label">Department</label>
	                        <div class="col-md-6">
	                            <select name="department" id="department" class="form-control selectpicker" data-live-search="true">
										@foreach($departments as $department)
												<option value="{{ $department }}" @if (old('department',$lecturer->department) == $department ) selected="selected" @endif >{{ $department }}</option>
										@endforeach
	                            </select>

	                            @if ($errors->has('department'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('department') }}</strong>
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