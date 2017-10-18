@extends('layouts.application')
@section('content')
	<div class="row">
		<h3> Edit Articles </h3>
		{!! Form::model($article, ['route'=>['articles.update', $article->id], 'method'=>'put', 'class'=>'form-horizontal', 'role'=>'form']) !!}
		@include('vendor.form')
		{!! Form::close() !!}
	</div>

	<div class="row margi">
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<h3 class="pull-left"><i class="pe-7s-photo pe-2x pe-va"></i>&emsp;Change Gallery </h3>
			<h3 class="pull-right"><a href="#modal-new" data-toggle="modal"><i class="pe-7s-plus pe-2x pe-va green"></i></a></h3>
		</div>
		
		@include('vendor.inside.edimag');
		{!! Form::open(['route'=>['add', $article->id], 'files'=>'true', 'class'=>'form-horizontal']) !!}
		<div class="modal fade" id="modal-new">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add New Image To Gallery</h4>
					</div>
					<div class="modal-body">
					
						
						<div class="file-loading hidden">
	    					<input id="file" name="file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]'>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						{!! Form::submit('Save changes', array('class'=>"btn btn-primary")) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@endsection