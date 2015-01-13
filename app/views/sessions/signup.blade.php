@extends('layout')
@section('content')
    <h2 class="title">Sign Up</h2>
    {{ Form::open(array('action' => 'UserController@post_create', 'files'=>true)) }} 
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
                {{ Form::label('avatar_url','Avatar',array('id'=>'','class'=>'')) }}
               <span class="btn btn-file">{{ Form::file('avatar_url',array('id'=>'avatar_url','class'=>'')) }}</span>
                <img src="#" id="avatar_preview" style="display:none;width:200px;height:200px;"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
               {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
            </td>
        </tr>
    </table>
    {{ Form::close() }}

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar_preview').show();
            $('#avatar_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar_url").on("change", function() {
   readURL(this);
});
</script>
@stop
