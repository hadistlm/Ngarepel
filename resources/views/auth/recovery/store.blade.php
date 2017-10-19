@extends("layouts.app")
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading"> Reset Password </div>

					<div class="panel-body">
						{!! Form::open(['route'=>['reminders.update', $id, $code], 'class' =>'form-horizontal', 'role' => 'form']) !!}
							<div class="form-group">
								{!! Form::label('password', 'Password', array('class' => 'col-md-4 control-label')) !!}
								<div class="col-lg-6">
									{!! Form::password('password', array('class' => 'form-control')) !!}
									<div class="text-danger">{!! $errors->first('password') !!}</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								{!! Form::label('password_confirmation', 'Password Confirm',array('class' => 'col-md-4 control-label')) !!}
								<div class="col-md-6">
									{!! Form::password('password_confirmation', array('class' =>'form-control')) !!}
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									{!! Form::submit('Reset Password', array('class' => 'btn btn-primary')) !!}
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