@extends('admin.layout')

@section('meta-title', 'Edit page')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit page
            </h1>
        </div>
    </div>
    {!! Form::model($page, ['route' => ['admin.page.update', $page->id], 'method' => 'put', 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['placeholder'=>'Title of the page', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', null, ['class' => 'wysiwyg']) !!}
                </div>
            </div>
            <div class="col-lg-3">
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
                            {{ $page->updated_at->format('d M Y \a\t H:i:s') }}
                            <div>
                                <a href="{{ route('page.show', $page->slug) }}" class="btn btn-info btn-xs" target="_blank">
                                    View page
                                </a>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('allow_comments') !!} Allow Comments
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', config('post_status'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lang', 'Language') !!}
                            {!! Form::select('lang', config('languages'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'Date of Creation') !!}
                            {!! Form::text('created_at', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="{{ route('admin.page.delete', $page->id) }}" class="text-danger confirm-delete btn btn-link">
                            Delete page
                        </a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Main Image
                    </div>
                    <div class="panel-body">
                        {!! Form::label('image', 'Select an Image') !!}
                        <div class="fileUpload">
                            {!! Form::file('image', ['class' => 'upload', 'id' => 'image_file_upload']) !!}
                            <img src="{{ ($page->image) ? $page->image : '/img/image-placeholder.png' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
