@extends('layouts.visitor')
@section('content')
<h1>Create Post</h1>
{{ Form::open(array('route' => 'posts.store')) }}
  <table class="table">
    <tr>
        <td>
            {{ Form::label('title', 'Title:') }}
        </td>
        <td>
            <div class="col-sm-8">
                {{ Form::text('title', '', array('class' => 'form-control')) }}
            </div>
        </td>
    </tr>
    <tr>
        <td>
                {{ Form::label('content', 'Content Url:') }}
        </td>
        <td>
            <div class="col-sm-8">
                {{ Form::text('content', '', array('class' => 'form-control')) }}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::label('description', 'Description:') }}
        </td>
        <td>
            <div class="col-sm-8">
                {{ Form::textarea('description', '', array('class' => 'form-control')) }}
            </div>
        </td>
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::hidden('rate', 0) }}
        {{ Form::hidden('status', "New") }}
    </tr>
    <tr>
        <td colspan="2">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}
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
