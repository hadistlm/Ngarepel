<div class="row">
	<div class="col-md-11">
	@foreach ($photos as $element)
		<div class="col-md-4 col-xs-12 col-sm-6 border">
			<img src="{{ asset('storage') }}/article_photos/{{ $element->file }}" class="img-responsive img-rounded" alt="Image">
			<center><strong> {{ $element->file }}</strong></center>
			{!! Form::open(['route'=>['change',$element->id], 'files'=>'true', 'class'=>'form-horizontal']) !!}
			{{ method_field('PUT') }}
			{!! Form::file('file', ['class'=>'col-md-12']) !!}
			
			<input type="submit" value="Change" class="col-md-10 col-xs-6 btn btn-success">
			<a class="btn btn-danger col-md-2 col-xs-6" data-toggle="modal" href='#{{ $element->id }}'><i class="pe-7s-close-circle"></i></a>
			
			{!! Form::close() !!}
			</div>

			{!! Form::open(array('route'=>['delete', $element->id], 'method'=>'delete' )) !!}
				@include('vendor.inside.modal')
			{!! Form::close() !!}
	@endforeach
	</div>
</div>

