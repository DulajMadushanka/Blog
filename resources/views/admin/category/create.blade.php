@extends('layouts.backend.app')

@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
          

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Category
                                
                            </h2>
                           
                        </div>
                        <div class="body">
                            <form action="{{url('/image')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name">
                                        <label class="form-label">Category Name</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-md-4 control-label"><b style="font-size:15pt;color:black;">Image</b></label>

                                    <div class="col-md-6">
                                        <input style="border-color:black;border-width:1px;" id="image" type="file" class="form-control" name="image" required>

                                    </div>
                                </div>

                                
                                <br>
                                <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.category.index')}}">Back</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
           
           
        </div>
@endsection

@push('script')

@endpush