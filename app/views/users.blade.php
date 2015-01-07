@extends('layout')
{{ HTML::style('css/users.css')}}
<h3>đây là cái table</h3>
@section('content')
  <table class="table table-bordered table-active">
    @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->name }}</td>
      </tr>
    @endforeach
  </table>
@stop

