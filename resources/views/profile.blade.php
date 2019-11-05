<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    
<link href="{{asset('assets/frontend/css/single-post/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/single-post/blog-post.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
<link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">


<!-- Stylesheets -->

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

</style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">


      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
         <!-- Title -->
        

         
         
			<div class="row">
      
      @if($posts->count()>0)
        @foreach($posts as $post)
        <div class="col-md-6 col-sm-12">
          <div class="card h-100">
            <div class="single-post post-style-1">

              <div class="blog-image"><img src="{{'http://localhost:8000/uploads/'.$post->image}}" alt="{{$post->title}}"></div>
              <br/>
              
              <div class="blog-info">
              
              <h5  class="title"><a href="{{route('post.details',$post->slug)}}"><span><b style="text-align:left;">{{$post->title}}</b></span></a></h5>
               <br/><br/>
               

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
            </div>
          </div><br/><br/>
        </div>
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
          
          <hr>

          
         
          <div style="margin-left:530px;">{{$posts->links()}}</div>
  

        </div>
        

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
        <div class="card my-4">
            <h5 class="card-header">About Author</h5>
            <div class="card-body">
            <a  class="avatar" href="#"><img style="width:140px;height:140px;border-radius:50%"  src="{{asset('uploads/'.$author->image)}}" alt="Profile Image"></a><br/><br/>
              <p >{{$author->name}}</p><br/>
              <p >{{$author->about}}</p>
              <strong >Author Since: {{$author->created_at->toDateString()}}</strong><br/><br/>
              <strong >Total Posts : {{$author->posts->count()}}</strong>
            </div>
          </div>

        
          

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>























