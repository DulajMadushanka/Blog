@extends('layouts.frontend.app')

@section('title','login')




@push('css')
<link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/swiper.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet">



<style>
	.favourite_posts{
		color:blue;
	}
	h1, h2, h3, h4, h5, h6, p, a, ul, span, li, img {
    margin: 0px;
    padding: 4px;
    font-weight: 300;
}

header .src-area {
    position: relative;
    height: 75px;
    width: 50%;
    float: right;
    display: inline-block;
    background: #F5F7F6;
}

</style>
@endpush

@section('content')

<div class="main-slider">
	<div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" 
	data-swiper-autoplay="10000"
	data-swiper-margin="0" data-swiper-slides-per-view="4" data-swiper-breakpoints="true" data-swiper-loop="true">
	<div class="swiper-wrapper">
		@foreach($categories as $category)
			<div class="swiper-slide">
				<a class="slider-category" href="{{route('category.posts',$category->slug)}}">
					<div class="blog-image">
						<img style="height:250px;"  src="{{'http://localhost:8000/uploads/'.$category->image}}" alt="{{$category->name}}">
					</div>
					<div class="category">
						<div class="display-table center-text">
							<div class="display-table-cell">
								<h3><b>{{$category->name}}</b></h3>
							</div>
						</div>
					</div>
				</a>
			</div>

		@endforeach
	</div>

</div><!-- slider -->

	<section class="blog-area section" style="margin-left:140px;">
		<div class="container" >

			<div class="row">
				@foreach($posts as $post)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{'http://localhost:8000/uploads/'.$post->image}}" alt="{{$post->title}}"></div>

							<a class="avatar" href="{{route('author.profile',$post->user->username)}}"><img src="{{'http://localhost:8000/uploads/'.$post->user->image}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('post.details',$post->slug)}}"><b>{{$post->title}}</b></a></h4>

								<ul class="post-footer">
									<li>
									@guest
										<a href="javascript:void(0);" onclick=""><i class="ion-heart"></i>{{$post->favourite_to_users->count()}}</a>
									@else
											<a href="javascript:void(0);" onclick="document.getElementById('favourite-form-{{$post->id}}').submit();" class="{{ !Auth::user()->favourite_posts->where('pivot.post_id',$post->id)->count() == 0 ? 'favourite_posts' : '' }}"><i class="ion-heart"></i>{{$post->favourite_to_users->count()}}</a>
											<form id="favourite-form-{{$post->id}}" method="post" action="{{route('post.favourite',$post->id)}}" style="display:none;">
											{{ csrf_field() }}
											</form>
									@endguest
									
									
									</li>
									<li>
										<a href="{{route('post.details',$post->slug)}}"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a>
									</li>
									<li><a href="{{route('post.details',$post->slug)}}"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				@endforeach
				
				<!-- toastr.info('To add favourite list. You need to login first.','Info',{
											closeButton: true,
											progressBar: true,
											}) -->
				
											<div style="margin-left:500px;">{{$posts->links()}}</div>
			</div><!-- row -->
			
		

		</div><!-- container -->
	</section><!-- section -->

@endsection  

@push('js')

@endpush