@extends('layouts.application')
@section('content')
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Your articles list</div>
		<div class="panel-body">
			<table class="table table-condensed table-hover" id="data-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Writer</th>
						<th>Title</th>
						<th>Content</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
			@push('script')
				<script type="text/javascript">
					$(function() {
					    $('#data-table').DataTable({
					        processing: true,
					        serverSide: true,
					        ajax: '{!! route('data.anydata') !!}',
					        columns: [
					            { data: 'id', name: 'id' },
					            { data: 'writer', name: 'writer' },
					            { data: 'title', name: 'title' },
					            { data: 'content', name: 'content' },
					            { data: 'action', name: 'action', "orderable": false}
					        ]
					    });
					});
				</script>
			@endpush
		</div>
	</div>
@endsection