@extends('layouts.application')
@section('content')
	<h3> Create Your Own Article </h3>
	{!! Form::open(['route'=>'articles.store', 'class'=>'form-horizontal','role'=>'form', 'enctype'=>'multipart/form-data']) !!}
		@include('vendor.form')
	{!! Form::close() !!}
@endsection