@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'login.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

                    <div class="form-group">
                        {!! Form::label('email', 'E-Mail Address', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="checkbox" name="remember" class="check"> Remember Me!
                        </div>
                        <div class="clear"></div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('reminders.create') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
