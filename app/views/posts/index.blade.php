<style>
.nav > li > a:hover {
    background-color: #000000;
  border-color: #fff;
}
</style>
@extends('layouts.visitor')
@section('content')
    <!-- Page Content -->
    <div class="container">


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <div class="text-right">
                        {{ link_to_action('PostController@leech_photo', 'Leech photo', array(), array('class' => 'btn btn-success')) }}
                        @if(isset($current_user))
                            {{ link_to_action('PostController@create', 'Create new post', array(), array('class' => 'btn btn-primary')) }}
                        @endif
                    </div>
                </h1>
            </div>
        </div>
        
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
          <input type="hidden" id="postType" value="{{ $type }}">
          <div class="btn-group" role="group">
            {{ link_to_route('posts.index', "All", array("type=all"), array('class' => 'btn btn-default ', 'id' => 'typeAll')) }}
          </div>
          <div class="btn-group" role="group">
            {{ link_to_route('posts.index', "Photo", array("type=photo"), array('class' => 'btn btn-default', 'id' => 'typePhoto')) }}
          </div>
          <div class="btn-group" role="group">
            {{ link_to_route('posts.index', "Video", array("type=video"), array('class' => 'btn btn-default', 'id' => 'typeVideo')) }}
          </div>
        </div>
        <hr>
        <!-- /.row -->

        <!-- Project One -->
        @if ($posts->count())
          @foreach($posts as $post)
            <div class="row">
                <div class="col-md-7">
                    @if($post->category == "photo")
                        {{ ViewHelper::displayOnePhoto($post->content, $post->id)  }}
                    @elseif($post->category == "video")
                        <iframe align="center" style="width:90%; height:350px"  src="{{ViewHelper::convertUrl($post->content)}}"  
      frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
                    @endif
                </div>
                <div class="col-md-5">
                    <a href='{{ URL::route("posts.show", ["post_id" => $post->id]) }}'><h3>{{ $post->title }}</h3></a>
                    <h5>Posted {{ViewHelper::time_elapsed_string($post->created_at)}} ago by  <a href="#">{{ $post->user->name }}</a></h5>
                    <!-- like -->
                    <div class="rateWrapper"><span class="like rate rateUp" id="{{$post->id}}" data-item="{{$post->id}}">
                    <span class="rateUpN">{{$post->true_likes()->count()}}</span></span>
                    <span class="disLike rate rateDown" data-item="{{$post->id}}">
                    <span class="rateDownN">{{$post->disLikes()->count()}}</span></span></div><br />
                    <!-- end like -->
                    <p>{{ $post->description }}</p>
                </div>
            </div>
            <hr>
            {{ $posts->appends(array('type' => $post->category))->links('pagination.only_next') }}
          @endforeach
        @else
          There are no posts
        @endif

        

        <div id="back-top">
            <a class="btn-default btn back-to-top glyphicon glyphicon-arrow-up" id="backToTopBtn" href="/" title="Top">To top</a>
        </div>
        <h3 class="text-right">qr code for this page</h3>
        <div id="qr_code"></div>

        
        <!-- /.row -->
<script>
    sessionStorage.setItem("leechLinks", "");

    $type = $("#postType").val();
    if($type == "photo") {
        $("#typePhoto").addClass('btn-warning disabled');
    } else if($type == "video") {
        $("#typeVideo").addClass('btn-warning disabled');
    } else {
        $("#typeAll").addClass('btn-warning disabled');
    }
</script>
<style type="text/css">
    #qr_code canvas {
        width: 100px;
    }
    #qr_code{
        text-align: right;
    }
</style>
@stop
