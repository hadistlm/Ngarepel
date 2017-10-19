<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta httpequiv="XUACompatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel 5</title>
		<link href="{{asset('css')}}/app.css" rel="stylesheet">
		<link href="{{asset('css')}}/style.css" rel="stylesheet">
		<link href="{{asset('css')}}/helper.css" rel="stylesheet">
		<link href="{{asset('css')}}/pe-icon-7-stroke.css" rel="stylesheet">
		<link href="{{asset('plugins')}}/toastr/toastr.min.css" rel="stylesheet">

		<link href="{{asset('plugins')}}/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
	</head>
	<body>
		@include('shared.head_nav')

		<div class="container-fluid clearfix">
			<div class="row">
				@include('shared.left_nav')

				<div id="main-content" class="col-xs-12 col-sm-9">
					@if(Session::has('error'))
						<div class="panel-body col-md-11">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{Session::get('error')}}
							</div>
						</div>
					@endif

					@if(Session::has('notice'))
						<div class="panel-body col-md-11">	
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{Session::get('notice')}}
							</div>
						</div>
					@endif
					
					<div class="col-md-12">
						@yield("content")
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="{{asset('js')}}/app.js"></script>
		<script type="text/javascript" src="{{asset('js')}}/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="{{asset('plugins')}}/bootstrap-fileinput/js/fileinput.min.js"></script>
		<script type="text/javascript" src="{{asset('plugins')}}/toastr/toastr.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

            @if(Session::has('logged'))
                toastr["success"]("{{Session::get('logged')}}", "Logged In")
            @endif

            @if(Session::has('warning'))
                toastr["warning"]("{{Session::get('warning')}}", "Warning!")
            @endif
        });
    </script>
	</body>
</html>