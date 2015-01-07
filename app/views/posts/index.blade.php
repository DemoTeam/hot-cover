@extends('layouts.visitor')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        @if ($posts->count())
          @foreach($posts as $post)
            <div class="row">
                <div class="col-md-7">
                    <iframe align="center" width="600px" height="300px" src="<?= $post->video_url ?>"  
      frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
                </div>
                <div class="col-md-5">
                    <h3>{{ $post->title }}</h3>
                    <h4>Subheading</h4>
                    <p>{{ $post->content }}</p>
                    {{ link_to_route('posts.show', 'View Video', array($post->id), array('class' => 'btn btn-primary')) }}<span class="glyphicon glyphicon-chevron-right"></span>
                </div>
            </div>
            <hr>
          @endforeach
        @else
          There are no posts
        @endif
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div style="text-align: center">{{ $posts->links(); }}</div>
        <!-- /.row -->