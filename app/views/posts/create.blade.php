@extends('layouts.visitor')
<h1>Create Post</h1>
@section('content')
{{ Form::open(array('route' => 'posts.store')) }}
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
            {{ Form::label('content', 'Content Url:') }}
        </td>
        <td>
            {{ Form::text('content') }}
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::label('description', 'Description:') }}
        </td>
        <td>
            {{ Form::textarea('description') }}
        </td>
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::hidden('rate', 0) }}
        {{ Form::hidden('status', "New") }}
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