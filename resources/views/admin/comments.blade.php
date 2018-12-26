@extends('layouts.backend.app')

@section('title','Comment')

@push('çss')
  <!-- JQuery DataTable Css -->
  <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
@endpush

@section('content')
<!-- Exportable Table -->

        <div class="container-fluid">
           
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Comments
                                <span class="badge bg-blue">{{$comments->count()}}</span>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Comments Info</th>
                                            <th class="text-center">Post Info</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                   
                                    @foreach($comments as $key=>$comment)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a>
                                                            <img class="media-object" src="{{asset('uploads/'.$comment->user->image)}}" width="64" height="64">
                                                        </a>

                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{$comment->user->name}}
                                                        <small>{{$comment->created_at->diffForHumans()}}</small></h4>
                                                        <p>{{$comment->comment}}</p>
                                                        <a target="_blank" href="{{route('post.details',$comment->post->slug.'#comments')}}">Reply</a>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="{{route('post.details',$comment->post->slug)}}">
                                                            <img class="media-object" src="{{asset('uploads/'.$comment->post->image)}}" width="64" height="64">
                                                        </a>

                                                    </div>
                                                    <div class="media-body">
                                                        
                                                        <a target="_blank" href="{{route('post.details',$comment->post->slug)}}">
                                                        <h4 class="media-heading">&nbsp;&nbsp;{{str_limit($comment->post->title,'40')}}</h4>
                                                        </a>
                                                        <p>&nbsp;&nbsp; by <strong>{{ $comment->post->user->name}}</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteComment()">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form method="POST" action="{{url('comments',array($comment->id))}}" id="deleteComment" enctype="multipart/form-data" style="display:none;">
                                                {{ csrf_field() }}
                                            
                                                
                                                </form>  
                                               
                                                  
                                            </td>
                                       
                                        </tr>
                                   
                                        @endforeach                                          
                                       
                                      
                                       
                                       
                                       
                                        
                                        
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    
@endsection

@push('js')
<script type="text/javascript">
        function deleteComment(){
           
            
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
                      
                        document.getElementById('deleteComment').submit();
                    }
                    else if(result.dismiss === swal.DismissReason.cancel){
                        swal(
                            'Cancelled',
                            'The comment remaining pending :',
                            'info'
                        )
                    }
                })
            }
        
    </script> 
  
  <!-- Jquery DataTable Plugin Js -->
  <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

   
    

@endpush