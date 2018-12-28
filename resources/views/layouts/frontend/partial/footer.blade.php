<footer style="width:1530px;">

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>
						<p class="copyright">{{config('app.name')}} @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<ul class="icons">
							<li><a href="https://www.facebook.com/dulaj.madushanka.372"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="https://twitter.com/DulajMa86670995"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="https://www.instagram.com/dulajgunawardana6"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="https://www.linkedin.com/in/dulaj-madushanka-gunawardana-6a37b5120/"><i class="ion-social-linkedin-outline"></i></a></li>
							
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							@foreach($categories as $category)
							<li><a href="{{route('category.posts',$category->slug)}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
						
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form method="post" action="{{url('/subscriber')}}">
							{{ csrf_field() }}
								<input class="email-input" name="email" type="email" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>