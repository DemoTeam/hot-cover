@extends('layout')
@section('content')
  <div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please sign in</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('route' => 'sessions.store', 'class'=>'form-horizontal' )) }}
                    <div class="form-group">
                        {{ Form::text('email', '', array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control')) }}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox"> Remember Me
                        </label>
                    </div>
                    <hr>
                    {{ Form::submit('Login', array('class' => 'btn btn-lg btn-info btn-block')) }}
                    
                    {{ HTML::link('signup', 'Register', array('class' => 'btn btn-lg btn-success btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
  </div>
@stop