<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Ngarepel</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if (Sentinel::check())
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a>Profile</a></li>
				<li><a href="{{ url('/articles') }}">Article</a></li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">{{ Sentinel::getUser()->first_name }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('logout') }}">Logout</a></li>
					</ul>
				</li>
				@else
					<li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/signup') }}">Register</a></li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>