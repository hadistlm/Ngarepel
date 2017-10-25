@extends('layouts.application')
@section("content")
	<div class="row">
		<div class="col-md-11">
			<h2 class="pull-left"> List Articles </h2>
			<a class="pull-right" href="{{ route('articles.create') }}"><i class="pe-7s-plus pe-4x pe-va green"></i></a> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-11" id="articles-list">
			@include('vendor.list')
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{!! $articles->render() !!}
		</div>	
	</div>
@stop