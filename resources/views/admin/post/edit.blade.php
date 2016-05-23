@extends('admin.layout')

@section('meta-title', 'Edit post')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit post
            </h1>
        </div>
    </div>
    {!! Form::model($post, ['route' => ['admin.post.update', $post->id] ,'method' => 'put', 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::text('title', null, ['placeholder' => 'Title of the post', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', null, ['class' => 'wysiwyg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags', 'Tags') !!}
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="Add tags">
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
                            {{ $post->updated_at->format('d M Y \a\t H:i:s') }}
                            <div>
                                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-info btn-xs" target="_blank">
                                    View Post
                                </a>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('allow_comments') !!} Allow Comments
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('is_updated') !!} Mark post as updated
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
                        <a href="{{ route('admin.post.delete', $post->id) }}" class="text-danger confirm-delete btn btn-link">
                            Delete post
                        </a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
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
                                    {!! Form::checkbox('category_id[]', $category->id, $post->categories->contains($category->id)) !!} {{ $category->name }}
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
                            {!! Form::file('image', ['class' => 'upload', 'id' => 'image_file_upload']) !!}
                            <img src="{{ ($post->image) ? $post->image : '/img/image-placeholder.png' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $('#tags').magicSuggest({
                cls: 'form-control',
                data: {!! $tags !!},
                @if (count(old('tags')))
                    value: [
                        @foreach (old('tags') as $tag)
                            '{{ $tag }}',
                        @endforeach
                    ]
                @else
                    value: [
                        @foreach ($post->tags as $tag)
                            '{{ $tag->name }}',
                        @endforeach
                    ]
                @endif
            });
        });
    </script>
@stop
