@extends('admin/main_layout')

@section('content')
    <section class="section-container">
        <h4>View Posts</h4>
        <div class="container panel panel-default">
            <div class="row panel panel-heading">
                <div class="col-sm-3">
                    <span>Tag</span>
                </div>
                <div class="col-sm-6">
                    <span>Description</span>
                </div>
                <div class="col-sm-1">
                    <span>Delete</span>
                </div>
                <div class="col-sm-1">
                    <span>Edit</span>
                </div>
                <div class="col-sm-1">
                    <span>View</span>
                </div>
            </div>

            @if($posts)
                    @foreach($posts as $post)
                    <div class="row panel panel-body">
                        <div class="col-sm-3">
                            <span>{{$post->tag;}}</span>
                        </div>
                        <div class="col-sm-6">
                            <span>{{$post->title;}}</span>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{URL::route('admin_delete_post', $post->id)}}"><button type="button" class="btn btn-danger btn-sm">
                                <span class="fa fa-times-circle" aria-hidden="true"></span>
                            </button></a>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{URL::route('admin_edit_post', $post->id)}}"><button type="button" class="btn btn-primary btn-sm">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                            </button></a>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{URL::route('admin_view_post', $post->id)}}"><button type="button" class="btn btn-primary btn-sm">
                                <span class="fa fa-eye" aria-hidden="true"></span>
                            </button></a>
                        </div>
                    </div>

                    @endforeach
            @endif
        </div>
    </section>
@stop