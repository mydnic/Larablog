@extends('admin.layout')

@section('meta-title', 'Edit link')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Link
            </h1>
        </div>
    </div>
    {!! Form::model($link, ['route' => ['admin.social.update', $link->id], 'method' => 'put']) !!}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title of the link']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'Link') !!}
                    {!! Form::input('url', 'url', null, ['class'=>'form-control', 'placeholder'=>'http://linkedin.com/in/name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('icon', 'FontAwesome Icon Code') !!}
                    {!! Form::text('icon', null, ['class'=>'form-control', 'placeholder'=>'fa-linkedin']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Publish
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <strong>
                                Last Modified on
                            </strong>
                            {{ $link->updated_at->format('d M Y \a\t H:i:s') }}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="{{ route('admin.social.delete', $link->id) }}" class="text-danger confirm-delete btn btn-link">
                            Delete link
                        </a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
