@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('error'))
        <div class="panel-body col-md-11">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('error')}}
            </div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'signup.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                	<div class="form-group">
                		{!! Form::label('first_name', "First Name", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                			<div class="text-danger">{{ $errors->first('first_name') }}</div>
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		{!! Form::label('last_name', "Last Name", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                			{!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                			<div class="text-danger">{{ $errors->first('last_name') }}</div>
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		{!! Form::label('email', "Email", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                            {!! Form::email('email', null, ['class'=>'form-control']) !!}
                			<div class="text-danger">{{ $errors->first('email') }}</div>
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		{!! Form::label('password', "Password", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                			{!! Form::password('password', ['class'=>'form-control']) !!}
                			<div class="text-danger">{{ $errors->first('password') }}</div>
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		{!! Form::label('password_confirmation', "Password Confirm", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                			{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		<div class="col-md-4"></div>
                		<div class="col-md-5">
                			{!! Form::submit('Register', ['class'=>'btn btn-block btn-primary']) !!}
                		</div>
                		<div class="clear"></div>
                	</div>
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
