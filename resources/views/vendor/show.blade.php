@extends('layouts.application')
@section('content')
	<article class="row">
		<div class="col-md-11">
			<h2> {{ $article->title }} </h2>
			<p class="text-justify"> &emsp;{{ $article->content }} </p>
		</div>
	</article>

	<div class="row">
		<div class="col-md-11">
			{{ link_to(route('articles.index'), "Back", ['class'=>'btn btn-default']) }}
			{{ link_to(route('articles.edit',$article->id), "Edit", ['class'=>'btn btn-info']) }}
			<a class="btn btn-danger" data-toggle="modal" href='#modal-id'>Delete</a>
		</div>
	</div>
	@include('vendor.modal')
@endsection