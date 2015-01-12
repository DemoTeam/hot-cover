@extends('layout')
<h3>Detail {{$user->name}}</h3>
@section('content')
<p>{{ link_to_route('users.index', 'Back to index') }}</p>
    <table class="table table-bordered table-striped" width="80%">
        <tr>
          <th>Name: {{ $user->name }}</th>
        </tr>
        <tr>
          <th><img src="{{ asset($user->avatar_url) }}" width="150" height="150"></th>
        </tr>
        <tr>
          <th>Email: {{ $user->email }}</th>
        </tr>
    </table>
@stop
