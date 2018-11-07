@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
          

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Tag
                                
                            </h2>
                           
                        </div>
                        <div class="body">
                            <form action="{{route('admin.tag.store')}}" method="POST">
                            {{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name">
                                        <label class="form-label">Tag Name</label>
                                    </div>
                                </div>

                                
                                <br>
                                <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.tag.index')}}">Back</a>
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