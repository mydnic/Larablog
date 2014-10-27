@extends('layout.bootstrap3.main')
@section('content')
    @include('layout.bootstrap3.forms.errors')
    {{ Form::open(['route'=>'session.store']) }}
        <div class="form-group">
            {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
        </div>
        <div class="form-group">
            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Sign in', ['class'=>'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop