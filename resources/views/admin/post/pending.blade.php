@extends('layouts.backend.app')

@section('title','Post')

@push('çss')
  <!-- JQuery DataTable Css -->
  <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
@endpush

@section('content')
<!-- Exportable Table -->

        <div class="container-fluid">
            <div class="block-header">
               <a class="btn btn-primary waves-effect" href="{{route('admin.post.create')}}">
               <i class="material-icons">add</i>
               <span>Add New Post</span>
               </a>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Posts
                                <span class="badge bg-blue">{{$posts->count()}}</span>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th><i class="material-icons">visibility</i></th>
                                            <th>Is Approved</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                   
                                    @foreach($posts as $key=>$post)
                                        <tr>
                                       
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{str_limit($post->title,'10')}}</td>
                                            <td class="text-center">{{$post->user->name}}</td>
                                            <td class="text-center">{{$post->view_count}}</td>
                                            <td class="text-center">
                                                @if($post->is_approved == true)
                                                    <span class="badge bg-blue">Approved</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>    
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if($post->status == true)
                                                    <span class="badge bg-blue">Published</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>    
                                                @endif

                                            </td>
                                           
                                            <td class="text-center">{{$post->created_at}}</td>
                                            <td class="text-center">{{$post->updated_at}}</td>
                                            <td class="text-center">
                                            @if($post->is_approved == false)
                                                <button type="button" class="btn btn-success waves-effect" onclick="approvalPost({{$post->id}})">
                                                    <i class="material-icons">done</i>
                                                    
                                                </button> 
                                                <form method="POST" action="{{url('approval',array($post->id))}}" id="approval-form" enctype="multipart/form-data" style="display:none;">
                                                {{ csrf_field() }}
                                            
                                                
                                                </form>  
                                           
                                            @endif
                                                <a href='{{url("/showpost/{$post->id}")}}' class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href='{{url("/editpost/{$post->id}")}}' class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href='{{url("/deletepost/{$post->id}")}}' class="btn btn-danger waves-effect" type="button" onclick="deleteTag(id)">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                  
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