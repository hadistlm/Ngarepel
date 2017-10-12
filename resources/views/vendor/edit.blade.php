@extends('layouts.application')
@section('content')
	<h3> Edit Articles </h3>
	{!! Form::model($article, ['route'=>['articles.update', $article->id], 'method'=>'put', 'class'=>'form_horizontal', 'role'=>'form']) !!}
	@include('vendor.form')
	{!! Form::close() !!}
@endsection