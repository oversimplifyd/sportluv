@extends('admin/main_layout')

@section('content')

    <article>
        <div class="container section-container">
            <div class="row">
                <div class="col-sm-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <img src="{{asset('post_uploads'.'/'.$post->post_image)}}"/>
                </div>
            </div>
            <div class="row" id="post_thread">
                <div class="col-sm-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2 class="section-heading">{{$post->tag}}</h2>
                    <p> {{nl2br(nl2br($post->description))}}</p>
                </div>
            </div>
            <div class="row view-post">
                <div class="col-sm-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <a href="{{URL::route('admin_update_view')}}"><button class="btn btn-primary">Go Back</button></a></div>
            </div>
        </div>
    </article>
    <hr>
@stop