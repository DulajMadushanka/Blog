@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')

    <div class="container-fluid">
        <form action="{{url('a_updatepost',array($posts->id))}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add New Post    
                                </h2>
                            </div>
                            <div class="body">
                          
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="title" class="form-control" value="{{$posts->title}}" name="title">
                                            <label class="form-label">Post Title</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="image">Feachered Image</label>
                                        <input type="file" value="{{$posts->image}}" name="image" required>
                                    </div>
                                 
                                    <div class="form-group">
                                        
                                        <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{$posts->status == true ? 'checked' : ''}}>
                                        <label for="publish">Publish</label>
                                    </div>
                                     
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Categories and Tags   
                                </h2>
                            
                            </div>
                            <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label for="category">Select Category</label>
                                            <select name="categores" id="category" class="form-control show-tick">
                                                @foreach($categories as $category)
                                                    <option
                                                       
                                                     value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <label for="category">Select Tag</label>
                                            <select name="tag" id="tag" class="form-control show-tick" >
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('author.post.index')}}">Back</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vertical Layout | With Floating Label -->
            
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    BODY
                                    
                                </h2>
                            
                            </div>
                            <div class="body">
                                <textarea id="tinymce" name="body">"{{$posts->body}}"</textarea>
                            </div>
                        </div>
                    </div>
                </div>
        </form>    
<!-- Vertical Layout | With Floating Label -->


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