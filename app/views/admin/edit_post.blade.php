@extends('admin/main_layout'))

@section('content')
    <section role="main" class="admin-post section-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <form  action="{{ URL::action('PostsController@adminUpdatePost', array('id' => $post->id))}}" method="post" enctype="multipart/form-data" class="form">
                        <div class="form-group">
                            <select name="tag" class="form-control" required>
                                @foreach($tags as $tag)
                                    @if($tag == $post->tag)
                                        <option selected>{{$tag}}</option>
                                    @endif
                                    <option>{{$tag}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}" required/>
                        </div>
                        <textarea class="ckeditor form-control" name="description" placeholder="Enter Passage Here" id="editor1">{{$post->description}}</textarea>
                        <div class="form-group upload">
                            <span>Change Picture</span>
                            <input type="file" class="form-control" name="image" placeholder="Upload Image"/>
                        </div>
                        <div class="form-group">
                            <button type="submit"name="submit" class="btn btn-primary form-control" >Update Post</button>
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
@stop
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>