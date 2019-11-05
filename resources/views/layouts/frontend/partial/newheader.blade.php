<!-- <header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="{{route('home')}}"><span style="color:red;">Home</span></a></li>
				@guest
				<li><a href="{{route('login')}}"><span style="font-size:25px;margin-top:-10px;"><b>Login</b></span></a></li>
					<li><a href="{{route('register')}}"><span style="font-size:25px;margin-top:-10px;"><b>Sign In</b></span></a></li>
				@else
					@if(Auth::user()->role->id==1)
						<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
					@endif
					@if(Auth::user()->role->id==2)
						<li><a href="{{route('author.dashboard')}}">Dashboard</a></li>
					@endif
				@endguest


				
			</ul>

			

		</div>
	</header> -->

	
<header style="background-color:#999999">
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src=""><span style="font-size:30pt;margin-top:-25px;margin-left:-40px;"><b>Blog</b></span></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				
				
			</ul><!-- main-menu -->

			
			

		</div><!-- conatiner -->
	</header>
	

	
	