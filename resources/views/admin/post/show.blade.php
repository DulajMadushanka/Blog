@extends('layouts.backend.app')

@section('title','Post')

@push('css')
   
@endpush

@section('content')

    <div class="container-fluid">
        <a href="http://localhost:8000/admin/post" class="btn btn-danger waves-effect">Back</a>
        @if($post->is_approved == false)
            <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvalPost({{$post->id}})">
                <i class="material-icons">done</i>
                <span>Approve</span>
            </button> 
            <form method="POST" action="{{url('approval',array($post->id))}}" id="approval-form" enctype="multipart/form-data" style="display:none;">
            {{ csrf_field() }}
           
            
            </form>  
        @else
            <button type="button" class="btn btn-success waves-effect pull-right" disabled>
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
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function approvalPost(id){
            
            
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true}).then((result)=>{
                    if(result.value){
                       
                        document.getElementById('approval-form').submit();
                    }
                    else if(result.dismiss === swal.DismissReason.cancel){
                        swal(
                            'Cancelled',
                            'The post remaining pending :',
                            'info'
                        )
                    }
                })
            }
        
    </script>    

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