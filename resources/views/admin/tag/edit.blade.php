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
                                Update Tag
                                
                            </h2>
                           
                        </div>
                        <div class="body">
                            <form action="{{url('editTag',array($tags->id))}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" value="{{$tags->name}}" name="name">
                                        
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
           
           
           
        </div>
@endsection

@push('script')

@endpush