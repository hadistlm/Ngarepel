@foreach ($articles as $data)
	<article class="row">
		<h1><a href="{{ route('articles.show', $data->id) }}"><i class="pe-7s-angle-right"></i></a>{{ $data->title }}</h1>
		<blockquote class="text-justify">
			&emsp;{{ str_limit($data->content, 250) }}
		</blockquote>
	</article>
	<div class="row">
		<div class="col-md-4 col-md-offset-9">
			{{ link_to(route('excel.download', $data->id), "Download", ['class'=>'btn btn-success']) }}
			{{ link_to(route('articles.show', $data->id), 'Read More', ['class'=>'btn btn-info']) }}
		</div>
	</div>
	<hr>
@endforeach