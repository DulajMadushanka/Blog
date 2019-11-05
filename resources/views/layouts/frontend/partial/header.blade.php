
<header style="background-color:#E6E6FA">
		<div class="container-fluid position-relative no-side-padding">
		
	
			<a href="#" class="logo"><img src=""><span style="font-size:30pt;margin-top:-30px;margin-left:-30px;"><b>Blog</b></span></a>

			

			<ul class="main-menu visible-on-click" id="main-menu">
				

				<li style="margin-top:7px;">
					<form class="form-inline my-2 my-lg-0 " method="post" action="{{url('/search')}}">
					{{csrf_field()}}
						<input class="form-control mr-sm-2" type="search"  value="{{isset($query) ? $query : ''}}" name="query" placeholder="Type of search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form></div>
				</li>
				@guest
					
					<li><a href="{{route('login')}}"><span style="font-size:25px;"><b class="fa fa-edit">Login</b></span></a></li>
					<li><a href="{{route('register')}}"><span style="font-size:25px;"><b>Sign In</b></span></a></li>
				@else
					@if(Auth::user()->role->id==1)
						<li style="color:black;"><a style="color:black;" href="{{route('admin.dashboard')}}"><span ><b>Dashboard</b></span></a></li>
					@endif
					@if(Auth::user()->role->id==2)
						<li><a href="{{route('author.dashboard')}}">Dashboard</a></li>
					@endif
				@endguest


				
			</ul><!-- main-menu -->
			

			<!-- <div class="src-area" style="height:55px;margin-top:10px;">
				<form method="post" action="{{url('/search')}}">
				{{csrf_field()}}
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input style="height:55px;border-radius:50px;"  class="src-input" value="{{isset($query) ? $query : ''}}" type="text" name="query" placeholder="Type of search">
				</form>
			</div> -->
			

		</div><!-- conatiner -->
	</header>
	

	
	