@extends('layouts.frontend.newapp')

@section('title')
  {{$query}}
@endsection




@push('css')
<link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">



<style>
	.favourite_posts{
		color:blue;
	}
	
}

</style>
@endpush

@section('content')


<div class="main-slider" id="a">
	
	<div class="swiper-wrapper" id="a" style="width:1520px;">
	
				
					<?php if(count($categories)>0){?>
              <img id="a" style="height:400px;"  src="{{'http://localhost:8000/uploads/'.$categories[0]['image']}}" >
          <?php }
          else{ ?>
                <img id="a" style="height:400px;"  src="{{'http://localhost:8000/uploads/blue.jpg'}}" >
         <?php }
          ?>
					
					
					<div class="category">
						<div class="display-table center-text">
							<div class="display-table-cell">
								<h1 style="font-size:40px;"><b>{{$posts->count()}} esults for {{$query}}</b></h3>
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
        <div class="col-lg-12 col-md-12">
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

@endpush