@extends('layout')
@section('content')
    <h2 class="title">Sign Up</h2>
    {{ Form::open(array('action' => 'UserController@post_create')) }} 
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    <table class="table table-bordered login-form">
        <tr>
            <td colspan="2">
                {{ Form::text('name', null, array('class'=>'input-block-level form-control', 'placeholder'=>'Name')) }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                {{ Form::text('email', null, array('class'=>'input-block-level form-control', 'placeholder'=>'Email Address')) }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
        {{ Form::password('password', array('class'=>'input-block-level form-control', 'placeholder'=>'Password')) }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
        {{ Form::password('password_confirmation', array('class'=>'input-block-level form-control', 'placeholder'=>'Confirm Password')) }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
        {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
            </td>
        </tr>
    </table>
    {{ Form::close() }}
@stop