@extends('admin.layout')

@section('content')
    {!! Form::open(['route'=>'admin.settings.social.store']) !!}
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {!! Form::text('title', null, ['placeholder'=>'Title of the link']) !!}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::label('url', 'Link') !!}
                    {!! Form::input('url', 'url', null, ['class'=>'form-control', 'placeholder'=>'http://linkedin.com/in/name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('icon', 'FontAwesome Icon Code') !!}
                    {!! Form::text('icon', null, ['class'=>'form-control', 'placeholder'=>'fa-linkedin']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
