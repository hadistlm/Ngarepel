@extends('layouts.application')
@section("content")
	<div class="row">
		<div class="col-md-11">
			<h2 class="pull-left"> List Articles </h2>
			<a class="pull-right" href="{{ route('articles.create') }}"><i class="pe-7s-plus pe-4x pe-va green"></i></a> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 col-xs-3">
			<p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p>	
		</div>
		<div class="col-md-8 col-xs-9">
			<div class="form-group">
				<input type="text" class="form-control" id="keywords" placeholder="Type article keywords">	
			</div>
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