@extends('layouts.application')
@section('content')
	<article class="row">
		<h2> {{ $article->title }} </h2>
		<p> {{ $article->content }} </p>
	</article>

	<div class="row">
		{{ link_to(route('articles.index'), "Back", ['class'=>'btn btn-default']) }}
		{{ link_to(route('articles.edit',$article->id), "Edit", ['class'=>'btn btn-info']) }}
		<a class="btn btn-danger" data-toggle="modal" href='#modal-id'>Delete</a>
	</div>
	@include('vendor.modal')
@endsection