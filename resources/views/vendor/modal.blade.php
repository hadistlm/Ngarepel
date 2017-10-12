	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-danger">Warning!</h4>
				</div>
				<div class="modal-body">
					Are You Sure Want To Delete Your Data?
				</div>
				<div class="modal-footer">
					{!! Form::open(array('route'=>array('articles.destroy', $article->id), 'method'=>'delete' )) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::submit('Save Changes', array('class'=>"btn btn-danger")) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>