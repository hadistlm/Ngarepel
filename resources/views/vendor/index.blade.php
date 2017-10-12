@extends('layouts.application')
@section("content")
	<div class="row">
		<div class="col-md-11">
			<h2 class="pull-left"> List Articles </h2>	
			{{ link_to(route("articles.create"),"Add Data", ["class"=>"pull-right btn btn-primary"]) }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-11">
			@include('vendor.list')
		</div>
	</div>
@stop