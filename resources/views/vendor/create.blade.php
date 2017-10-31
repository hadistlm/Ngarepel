@extends('layouts.application')
@section('content')
	<h3> Create Your Own Article </h3>
	{!! Form::open(['route'=>'articles.store', 'class'=>'form-horizontal','role'=>'form', 'enctype'=>'multipart/form-data']) !!}
		@include('vendor.form')
	{!! Form::close() !!}

	@if ($create)
	<h3> Or just upload using excel</h3>
	{!! Form::open(['route'=>'excel.upload', 'class'=>'form-horizontal','role'=>'form', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">
		{!! Form::label('excel', "Excel", ['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-9">
			<!--<div class="file-loading hidden">
	    		<input id="excel" name="excel" type="file" class="file" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["xlsx"]'>
			</div>-->
			{!! Form::file('excel', []) !!}
			<div class="text-danger">{{ $errors->first('excel') }}</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-2">
			{!! Form::submit("Upload", array('class' => 'btn btn-success')) !!}
		</div>
		<div class="clear"></div>
	</div>
	{!! Form::close() !!}
	@endif
@endsection