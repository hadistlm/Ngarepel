@foreach ($articles as $data)
	<article class="row">
		<h1>{{ $data->title }}</h1>
		<p>
			{{ str_limit($data->content, 250) }}
			{{ link_to(route('articles.show', $data->id), 'Read More..' )}}
		</p>
	</article>
@endforeach