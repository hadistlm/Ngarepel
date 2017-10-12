@extends('layouts.application')
@section('content')
	<h3> Create Your Own Article </h3>
	{!! Form::open(['route'=>'articles.store', 'class'=>'form-horizontal','role'=>'form']) !!}
		@include('vendor.form')
	{!! Form::close() !!}
@endsection