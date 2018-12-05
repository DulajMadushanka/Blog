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
           
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Favourite Posts
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
                                            <th><i class="material-icons">favorite</i></th>
                                            <!-- <th><i class="material-icons">comment</i></th> -->
                                            <th><i class="material-icons">visibility</i></th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                   
                                    @foreach($posts as $key=>$post)
                                        <tr>
                                       
                                            <td class="">{{$key + 1}}</td>
                                            <td class="">{{str_limit($post->title,'10')}}</td>
                                            <td class="">{{$post->user->name}}</td>
                                            <td class="">{{$post->favourite_to_users->count()}}</td>
                                            <td class="">{{$post->view_count}}</td>
                                           
                                           
                                           
                                           
                                            <td class="">
                                           
                                           
                                           
                                                <a href='{{url("/showpost/{$post->id}")}}' class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
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