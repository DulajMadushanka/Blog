@extends('layouts.backend.app')

@section('title','Post')

@push('css')
   
@endpush

@section('content')

    <div class="container-fluid">
        <a href="http://localhost:8000/author/post" class="btn btn-danger waves-effect">Back</a>
        @if($post->is_approved == false)
            <button type="button" class="btn btn-success pull-right">
                <i class="material-icons">done</i>
                <span>Approve</span>
            </button>    
        @else
            <button type="button" class="btn btn-success pull-right" disabled>
                <i class="material-icons">done</i>
                <span>Approved</span>
            </button>   
        @endif
        <br/><br/>
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{$post->title}} 
                                    <small>Posted By <strong><a href="" >{{$post->user->name}}</a></strong> on {{$post->created_at->toFormattedDateString()}}</small>  
                                </h2>
                            </div>
                            <div class="body">
                                   {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Categories  
                                </h2>
                            
                            </div>
                            <div class="body">
                                 @foreach($category as $category)  
                                    <span class="label bg-cyan">{{$category->name}}</span>

                                 @endforeach 

                                  
                            </div>
                        </div>

                        <div class="card">
                            <div class="header bg-green">
                                <h2>
                                    Tags  
                                </h2>
                            
                            </div>
                            <div class="body">
                                 @foreach($tag as $tag)  
                                    <span class="label bg-green">{{$tag->name}}</span>

                                 @endforeach 

                                  
                            </div>
                        </div>

                        <div class="card">
                            <div class="header bg-amber">
                                <h2>
                                    Feacher Image 
                                </h2>
                            
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{'http://localhost:8000/uploads/'.$post->image}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
               
            
                
      


</div>








@endsection

@push('js')
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
    
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
});
    </script>
@endpush