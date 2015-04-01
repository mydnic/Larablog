@extends('layout.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/wysiwyg/dist/ui/trumbowyg.min.css">
    <style>
        input[name=title]{
            border: 0px;
            outline: none;
            width: 100%;
        }
        .trumbowyg-box{
            width: 100%;
            margin: 36px auto;
        }
    </style>
@stop

@section('content')

@include('layout.errors')

{!! Form::model($project, ['route'=>['admin.project.update', $project->id] ,'method' => 'put', 'files'=>true]) !!}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!! Form::text('title', null, ['placeholder'=>'Project Name']) !!}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="form-group">
                {!! Form::label('sub_title', 'Sub Title') !!}
                {!! Form::text('sub_title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('description', null) !!}
            </div>
        </div>
        <div class="col-lg-3">
            <div class="well">
                <div class="form-group">
                    {!! Form::label('category_id', 'Categories') !!}
                    @foreach ($categories as $category)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('category_id[]', $category->id, $project->categories->contains($category->id)) !!} {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
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
                <div class="form-group">
                    {!! Form::label('image', 'Select a Featured Image') !!}
                    <div class="fileUpload">
                        {!! Form::file('image', ['class'=>'upload', 'id'=>'image_file_upload']) !!}
                        <img src="{{$project->image_path}}" alt="">
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('project_images', 'Select More Images') !!}
                    <div class="fileUpload">
                        {!! Form::file('project_images[]', ['class'=>'upload multiple', 'id'=>'multiple_image_file_upload', 'multiple']) !!}
                        <div class="multiple-container">
                            @foreach ($project->images as $image)
                                <img src="{{ $image->path }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
    <script src="/admin/wysiwyg/dist/trumbowyg.min.js"></script>
    <script src="/admin/js/jquery.tags.js"></script>
    <script>
        $('textarea').trumbowyg({
            autogrow: true,
            btnsAdd: ['base64']
        });
        jQuery(document).ready(function($) {
            // Avatar Upload and preview
            function readURL(input, id) {
                if ($(input).hasClass('multiple')) {
                    if (input.files) {
                        $('.multiple-container').empty();
                        $.each(input.files, function(index, val) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#'+id).next('.multiple-container').append('<img src="'+e.target.result+'" alt="">');
                            }
                            
                            reader.readAsDataURL(input.files[index]);
                        });
                    }
                }
                else {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                            $('#'+id).next('img').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
            
            $(".fileUpload .upload").change(function() {
                var val = $(this).val();

                switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                    case 'gif': case 'jpg': case 'png':
                        var id = $(this).attr('id');
                        readURL(this, id);
                        break;
                    default:
                        $(this).val('');
                        // error message here
                        alert("not an image");
                        break;
                }
            });
        });
    </script>
@stop