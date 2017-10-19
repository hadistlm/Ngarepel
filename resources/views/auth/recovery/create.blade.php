@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'reminders.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                	
                	<div class="form-group">
                		{!! Form::label('email', "E-Mail Address", ['class'=>'col-md-4 control-label']) !!}
                		<div class="col-md-6">
                			{!! Form::email('email', null, ['class'=>'form-control']) !!}
                			<div class="text-danger">{{ $errors->first('email') }}</div>
                		</div>
                		<div class="clear"></div>
                	</div>

                	<div class="form-group">
                		<div class="col-md-6 col-md-offset-4">
                			{!! Form::submit("Send Password Reset Link", ['class'=>'btn btn-primary']) !!}
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
