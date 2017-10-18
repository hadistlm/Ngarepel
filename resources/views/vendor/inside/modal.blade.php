@if ($create == true)
	<div class="modal fade" id="modal-id">
@else
	<div class="modal fade" id="{{ $element->id }}">
@endif
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-danger">Warning!</h4>
				</div>
				<div class="modal-body text-center">
					@if ($create == false)
						Are You Sure Want To Delete ?
						<strong> {{ $element->file }} </strong>
					@else
						Are You Sure Want To Delete Your Data?
					@endif
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::submit('Confirm', array('class'=>"btn btn-danger")) !!}
				</div>
			</div>
		</div>
	</div>