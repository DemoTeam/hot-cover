@extends('layouts.visitor')
<h3>Detail {{$post->title}}</h3>
@section('content')
<p>{{ link_to_route('posts.index', 'Back to index') }}</p>
    <table text-align="center" class="table table-bordered table-striped table-posts" width="80%">
        <tr>
          <th>Name: {{ $post->title }}</th>
        </tr>
        <tr>
          <th>
<iframe align="center" width="45%" height="350px" src="<?= $post->video_url ?>"  
  frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
          </th>
        </tr>
        <tr>
          <td>{{ $post->content }}</td>
        </tr>
    </table>
@stop