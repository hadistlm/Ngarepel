@extends('layouts.application')
@section('content')
	<article class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-12">
					<h1 class="pull-left">{{ $article->title }}</h1>
					<h1 class="pull-right">
						{{ link_to(route('articles.index'), "Back", ['class'=>'btn btn-default']) }}
						{{ link_to(route('articles.edit',$article->id), "Edit", ['class'=>'btn btn-info']) }}
						<a class="btn btn-danger" data-toggle="modal" href='#modal-id'>Delete</a>
					</h1>
				</div>
			</div>

			<div class="row"> 
				<div class="well">
					<p class="text-justify"> &emsp;{{ $article->content }} </p>
				</div>
			</div>
		</div>
	</article>

	<div class="row">
		<h3> What People Said </h3>
		@if (!$comments->isEmpty())
			@foreach ($comments as $data)
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-2">
						<center><img src="{{ asset('image')}}/463230.jpg" class="img-responsive img-rounded" alt="Image">
						-<strong> {{ $data->user }} </strong>-</center>
					</div>
					<div class="col-md-9 borderv1">
						<p class="text-justify"> {{ $data->content }}</p>
						<i class="pull-right"> {{ $data->created_at->format('D, d M Y') }}</i>
					</div>
				</div>
			</div>
			<hr class="col-md-8 col-md-offset-1">
			@endforeach
		@else
			<p> No Comments Recorded</p>
		@endif
	</div>

	<div class="row">
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<div class="row margi">
				<h3><a href="#comen" data-toggle="collapse" data-target="#comen"><i class="pe-7s-comment pe-2x pe-va"></i>&emsp;Add Comment</a></h3>
			</div>
			
			<div class="row">
				<div id="comen" class="collapse"> 
					@include('vendor.inside.comment')
				</div>
			</div>
		</div>
	</div>
	@include('vendor.inside.modal')
@endsection