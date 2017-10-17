{!! Form::hidden('writer', "Admin", ['class'=>'hidden']) !!}
<div class="form-group">
	{!! Form::label('title', 'Title', array('class' => 'col-lg-2 control-label')) !!}
	<div class="col-lg-9">
		{!! Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
		<div class="text-danger">{{ $errors->first('title') }}</div>
	</div>
	<div class="clear"></div>
</div>

<div class="form-group">
	{!! Form::label('content', 'Content', array('class' => 'col-lg-2 control-label')) !!}
	<div class="col-lg-9">
		{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => '10')) !!}
		<div class="text-danger">{{ $errors->first('content') }}</div>
	</div>
	<div class="clear"></div>
</div>

@if($create)
	<div class="form-group">
		{!! Form::label('file', "File", ['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-9">
			{!! Form::file('file[]', ['multiple'=>'multiple']) !!}
			<div class="text-danger">{{ $errors->first('file') }}</div>
		</div>
	</div> 
@endif

<div class="form-group">
	<div class="col-lg-2"></div>
	<div class="col-lg-9">
		{!! Form::submit("Save", array('class' => 'btn btn-success')) !!}
		@if ($create)
			{{ link_to(route('articles.index'), "Back", ['class' => 'btn btn-default'] )}}
		@else
			{{ link_to(route('articles.show', $article->id), "Back",['class' => 'btn btn-default'] )}}
		@endif
	</div>
	<div class="clear"></div>
</div>