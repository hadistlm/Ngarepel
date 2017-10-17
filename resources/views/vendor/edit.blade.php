@extends('layouts.application')
@section('content')
	<div class="row">
		<h3> Edit Articles </h3>
		{!! Form::model($article, ['route'=>['articles.update', $article->id], 'method'=>'put', 'class'=>'form-horizontal', 'role'=>'form']) !!}
		@include('vendor.form')
		{!! Form::close() !!}
	</div>

	<div class="row margi">
		<h3><i class="pe-7s-photo pe-2x pe-va"></i>&emsp;Change Gallery </h3>		
		@include('vendor.inside.edimag');
	</div>
@endsection