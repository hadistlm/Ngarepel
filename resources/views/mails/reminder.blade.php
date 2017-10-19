<body>
	<h3> Hello, {{ $detail['email'] }}</h3>
	<blockquote>
		<p> Somebody request to changes password on Ngarepel website</p><br>
		<p> If its you please consider follow the link below</p><br>
		{!! link_to(route('reminders.edit', ['id' => $detail['id'], 'code' => $detail['code']]), 'Click me!') !!}
		<h4> Thank You </h4>
	</blockquote>
</body>