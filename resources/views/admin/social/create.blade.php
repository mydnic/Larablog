@extends('admin.layout')

@section('meta-title', 'Add new link')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add new post
            </h1>
        </div>
    </div>
    {!! Form::open(['route' => 'admin.social.store']) !!}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title of the link', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'Link') !!}
                    {!! Form::input('url', 'url', null, ['class' => 'form-control', 'placeholder' => 'http://linkedin.com/in/name', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('icon', 'FontAwesome Icon Code') !!}
                    {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'fa-linkedin', 'required']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Publish
                        </h3>
                    </div>
                    <div class="panel-footer text-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
