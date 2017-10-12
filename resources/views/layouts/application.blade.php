<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta httpequiv="XUACompatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-
		scale=1">

		<title>Laravel 5</title>
		<link href="{{asset('css')}}/app.css" rel="stylesheet">

		<link href="/assets/css/material-design/bootstrap-material-design.css" rel="stylesheet" />
		<link href="/assets/css/material-design/ripples.css"rel="stylesheet" />
		<link href="/assets/css/custom/layout.css" rel="stylesheet" />
	</head>
	<body>
		@include('shared.head_nav')

		<div class="container-fluid clearfix">
			<div class="row">
				@include('shared.left_nav')

				<div id="main-content" class="col-xs-12 col-sm-9">
					<div class="panel-body">
						@if(Session::has('error'))
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{Session::get('error')}}
							</div>
						@endif

						@if(Session::has('notice'))
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{Session::get('notice')}}
							</div>
						@endif
						@yield("content")
					</div>
				</div>
				
			</div>
		</div>
		<script type="text/javascript" src="{{asset('js')}}/app.js"></script>
		<script type="text/javascript" src="{{asset('js')}}/jquery-3.2.1.min.js"></script>
		<script src="/assets/js/material-design/material.js"></script>
		<script src="/assets/js/material-design/ripples.js"></script>
		<script src="/assets/js/custom/layout.js"></script>
	</body>
</html>