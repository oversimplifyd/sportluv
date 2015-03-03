@extends('admin/main_layout'))

@section('content')

    <section role="main" class="admin-post section-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <form  action="{{ url('/admin/create_post')}}" method="post" enctype="multipart/form-data" class="form">
                        <div class="form-group">
                            <select name="tag" class="form-control" required>
                                @foreach($tags as $tag)
                                    <option>{{$tag}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Enter a title for this post" required/>
                        </div>
                        <textarea class="ckeditor form-control" name="description" placeholder="Enter Passage Here" id="editor1"></textarea>
                        <div class="form-group upload">
                            <span>Upload a Picture</span>
                            <input type="file" class="form-control" name="image" placeholder="Upload Image"/>
                        </div>
                        <div class="form-group">
                            <button type="submit"name="submit" class="btn btn-primary form-control" >Submit Post</button>
                        </div>
                        @if(Session::has('error'))
                            <div class="form-group">
                                <span name="error" class="error form-control" >{{Session::get('error')}}</span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </section>

       {{-- {{Form::open(array('action' => 'PostsController@adminCreatePost', 'method' => 'post'))}}
        {{Form::label('Select a tag')}}
        {
        </br>{Form::select('tag', array('Al' => 'All', 'Fi' => 'Fixxtures'), 'Al')}}
        {{Form::label('title')}}
        {{Form::text('title')}}
        {{Form::label('description')}}
        {{Form::textarea('description')}}
        {{Form::file('post_image')}}
        {{Form::submit('Post')}}
        {{Form::close()}}
--}}
@stop
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>





