@extends('layouts.frontend.app')

@section('title','login')




@push('css')
<link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">



<style>
	.favourite_posts{
		color:blue;
	}
	h1, h2, h3, h4, h5, h6, p, a, ul, span, li, img {
    margin: 0px;
    padding: 4px;
    font-weight: 300;
}

*, *::before, *::after {
    box-sizing: "";
}

</style>
@endpush

@section('content')


<div class="main-slider" id="a">
	
	<div class="swiper-wrapper" id="a" style="width:1520px;">
	
				
					
						<img id="a" style="height:400px;"  src="{{'http://localhost:8000/uploads/'.$category->image}}" >
					
					<div class="category">
						<div class="display-table center-text">
							<div class="display-table-cell">
								<h3 style="font-size:40px;"><b>{{$category->name}}</b></h3>
							</div>
						</div>
				
			
			</div>

	


</div>

	<section class="blog-area section">
		<div class="container">

			<div class="row">
      
        @if($posts->count()>0)
          @foreach($posts as $post)
          <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{'http://localhost:8000/uploads/'.$post->image}}" alt="{{$post->title}}"></div>

                <a class="avatar" href="#"><img src="{{'http://localhost:8000/uploads/'.$post->user->image}}" alt="Profile Image"></a>

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
                      <a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a>
                    </li>
                    <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                  </ul>

                </div><!-- blog-info -->
              </div><!-- single-post -->
            </div><!-- card -->
          </div><!-- col-lg-4 col-md-6 -->
          @endforeach

        @else
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="single-post post-style-1">

                
                <div class="blog-info">

                  <h4 class="title">
                    <strong>Sorry, No post found :(</strong>
                  </h4>

                 

                </div><!-- blog-info -->
              </div><!-- single-post -->
            </div><!-- card -->
          </div><!-- col-lg-4 col-md-6 -->
        @endif
				
			
			</div><!-- row -->
			
		

		</div><!-- container -->
	</section><!-- section -->

@endsection  

@push('js')
<script>
$("#a").removeAttr("style");
$("#a").removeAttr("box-sizing") 

</script>
@endpush