@extends('admin.layout')

@section('meta-title', 'Add new project')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Add new project
            </h1>
        </div>
    </div>
    {!! Form::open(['route' => 'admin.project.store', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['placeholder' => 'Project Name', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sub_title', 'Sub Title') !!}
                    {!! Form::text('sub_title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('description', null, ['class' => 'wysiwyg']) !!}
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
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('published', true, true) !!} Mark As Published
                            </label>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Project Information
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('client', 'Client') !!}
                            {!! Form::text('client', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'URL') !!}
                            {!! Form::input('url', 'link', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::input('date', 'date', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Categories
                        </h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($categories as $category)
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('category_id[]', $category->id) !!} {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Main Image
                    </div>
                    <div class="panel-body">
                        {!! Form::label('image', 'Select an Image') !!}
                        <div class="fileUpload">
                            {!! Form::file('image', ['class' => 'upload']) !!}
                            <img src="/img/image-placeholder.png">
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Secondary Images
                    </div>
                    <div class="panel-body">
                        {!! Form::label('project_images', 'Select More Images') !!}
                        <div class="fileUpload multiple">
                            {!! Form::file('project_images[]', ['class'=>'upload', 'id'=>'image_file_upload', 'multiple']) !!}
                            <img src="/img/image-placeholder.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
