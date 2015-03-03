@extends('main_layout')

@section('content')
    <div class="container index post-box">
         @if($posts)
         @foreach($posts as $post)
         <div class="row post" style="margin-bottom: 5px">
             <div class="col-sm-4">
                 <div style="padding: 30px"><img src="{{asset('post_uploads'.'/'.$post->post_image)}}" class="img-responsive"></div>
             </div>
             <div class="col-sm-6">
                     <a href="{{URL::route('view_post',$post->id)}}#post_thread" style="text-decoration: none">
                         <h3>
                             {{$post->tag}}
                         </h3>
                     </a>
                         <div style="height: 200px"><p>{{$post->limitString()}}</p></div>
                 <div class="row" class="panel panel-danger">
                     <div class="col-sm-4" class="post-details">
                         <div class="post-details"><p> Posted by {{$post->user->username}}</p></div>
                     </div>
                     <div class="col-sm-4">
                         <div class="post-details"><p>{{$post->created_at->diffforHumans()}}</p></div>
                     </div>
                     <div class="col-sm-4" class="post-details">
                         <a href="{{URL::route('view_post',$post->id)}}#disqus_thread" style="text-decoration: none"><p><span class="glyphicon glyphicon-comment post-details" style="color: green"></span> Comments</p></a>
                     </div>
                 </div>
             </div>
        </div>
        @endforeach
        @endif
    </div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'sportluv'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>
@stop