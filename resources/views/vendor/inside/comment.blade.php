			{!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
			{!! Form::hidden('article_id', $article->id, ['class'=>'hidden']) !!}
				

			<div class="form-group">
				{!! Form::label('content', "Content", array('class'=>'col-md-2 control-label')) !!}
				<div class="col-md-9">
					{!! Form::textarea('content', null, array('class'=>'form-control', 'rows'=>10, 'autofocus'=>'true')) !!}
					<div class="text-danger">{{ $errors->first('content') }}</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-group">
				{!! Form::label('user', 'Username', array('class'=>'col-md-2 control-label')) !!}
				<div class="col-md-9">
					{!! Form::text('user', null, array('class'=>'form-control')) !!}
					<div class="text-danger">{{ $errors->first('user') }}</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-9">
					{!! Form::submit("Post", ['class'=>'btn btn-lg btn-primary']) !!}
				</div>
				<div class="clear"></div>
			</div>
			{!! Form::close() !!}