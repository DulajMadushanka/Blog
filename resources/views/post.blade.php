<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    
<link href="{{asset('assets/frontend/css/single-post/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/single-post/blog-post.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


<!-- Stylesheets -->

<link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/swiper.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet">

<style>
	.favourite_posts{
		color:blue;
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
          <h3 class="mt-4">{{$post->title}}</h3>

          <!-- Author -->
         

          <hr>

          <!-- Date/Time -->
          <a  class="avatar" href="#"><img style="width:70px;height:50px;border-radius: 50%;"  src="{{asset('uploads/'.$post->user->image)}}" alt="Profile Image"></a>
          <p>{{$post->user->name}} {{$post->created_at->diffForHumans()}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{asset('uploads/'.$post->image)}}" alt="">

          <hr>

          <!-- Post Content -->
          <h3 class="mt-4">{{$post->title}}</h3>
          <div class="para">
    
                {!! html_entity_decode($post->body) !!}
          </div>
          
          <ul class="list-unstyled mb-0">
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
									<li style="margin-left:80px;margin-top:-25px;"><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									<li style="margin-left:160px;margin-top:-23px;"><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
								</ul>
         
          <hr>
          

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
        <div class="card my-4">
            <h5 class="card-header">Author About</h5>
            <div class="card-body">
              <p>{{$post->user->about}}</p>
            </div>
          </div>

          

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Tags</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    @foreach($tags as $tag)
                      <li>
                          <a href="#">{{$tag->name}}</a>
                      </li>

                    @endforeach
                    
                  </ul>
                </div>
                
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  @foreach($categorys as $category)
                      <li>
                          <a href="#">{{$category->name}}</a>
                      </li>

                    @endforeach
                  </ul>
                </div>
               
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          

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























