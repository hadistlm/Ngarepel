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
	<div class="col-md-11">
		<h5 class="text-center borderv1"> No Comments Recorded</h5>
	</div>
@endif