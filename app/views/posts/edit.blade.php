@extends('layouts.visitor')
<h1>Create Post</h1>
@section('content')
{{ Form::model($post, array('method' => 'PATCH', 'route' =>
 array('posts.update', $post->id))) }}
  <table class="table">
    <tr>
        <td>
            {{ Form::label('title', 'Title:') }}
        </td>
        <td>
            {{ Form::text('title') }}
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::label('video_url', 'Video Url:') }}
        </td>
        <td>
            {{ Form::text('video_url') }}
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::label('content', 'Comment:') }}
        </td>
        <td>
            {{ Form::textarea('content') }}
        </td>
    </tr>
    <tr>
        <td colspan="2">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </td>
    </tr>
{{ Form::close() }}
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
  </table>
@stop