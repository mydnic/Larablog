@extends('admin.layout')

@section('meta-title', 'Add new post')

@section('styles')
    <style>
        .trumbowyg-box{
            width: 100%;
        }
        .trumbowyg-editor{
            background-color: #fff;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add new post
            </h1>
        </div>
    </div>
    {!! Form::open(['route' => 'admin.post.store', 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['placeholder' => 'Title of the post', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', null) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags', 'Tags') !!}
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="Add tags">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Publish
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', config('post_status'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lang', 'Language') !!}
                            {!! Form::select('lang', config('languages'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('allow_comments', true, true) !!} Allow Comments
                            </label>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categories') !!}
                    @foreach ($categories as $category)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('category_id[]', $category->id) !!} {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Select an Image') !!}
                    <div class="fileUpload">
                        {!! Form::file('image', ['class' => 'upload', 'id' => 'image_file_upload']) !!}
                        <img src="" alt="">
                    </div>
                </div>
                <div class="form-group">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $('textarea').trumbowyg({
            autogrow: true,
            btnsDef: {
                // Customizables dropdowns
                image: {
                    dropdown: ['insertImage', 'upload', 'base64', 'noEmbed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['undo', 'redo'],
                ['formatting'],
                'btnGrp-design',
                ['link'],
                ['image'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['horizontalRule'],
                ['fullscreen']
            ],
            plugins: {
                // Add imagur parameters to upload plugin
                upload: {
                    serverPath: 'https://api.imgur.com/3/image',
                    fileFieldName: 'image',
                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
                    urlPropertyName: 'data.link'
                }
            }
        });
        jQuery(document).ready(function($) {
            // Avatar Upload and preview
            function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#'+id).next('img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#tags').magicSuggest({
                cls: 'form-control',
                data: {!!$tags!!},
                @if (count(old('tags')))
                    value: [
                    @foreach (old('tags') as $tag)
                        '{{$tag}}',
                    @endforeach
                ]
                @endif
            });
        });
    </script>
@stop
