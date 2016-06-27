@extends('admin.layout')

@section('meta-title', 'Edit Settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Your website settings
            </h1>
        </div>
    </div>

    <div class="row">
        {!! Form::model($settings, ['route' => 'admin.settings.store', 'files' => true]) !!}
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Metas</h2>
                        <div class="form-group">
                            {!! Form::label('app_name', 'Website name') !!}
                            {!! Form::text('app_name', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('app_baseline', 'Website Baseline') !!}
                            {!! Form::text('app_baseline', null, ['class' => 'form-control', 'placeholder' => 'Awesome blog']) !!}
                        </div>
                        <h2>Parameters</h2>
                        <div class="form-group">
                            {!! Form::label('show_on_front', 'Display on home') !!}
                            {!! Form::select('show_on_front', ['posts' => 'Blogs Posts', 'projects' => 'Portfolio'], null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Plugins</h2>
                        <div class="form-group">
                            {!! Form::label('disqus_shortname', 'Disqus Shortname') !!}
                            {!! Form::text('disqus_shortname', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxx']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('google_analytics_code', 'Google Analytics Code') !!}
                            {!! Form::text('google_analytics_code', null, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXX-X']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('post_bottom_scripts', 'Special script to add at the bottom of your posts') !!}
                            {!! Form::textarea('post_bottom_scripts', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('banner', 'Website Banner') !!}
                            <div class="fileUpload">
                                {!! Form::file('banner', ['class' => 'upload']) !!}
                                <img src="{{ ($settings->banner) ? $settings->banner : '/img/image-placeholder.png' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('logo', 'Website logo') !!}
                            <div class="fileUpload">
                                {!! Form::file('logo', ['class'=>'upload']) !!}
                                <img src="{{ ($settings->logo) ? $settings->logo : '/img/image-placeholder.png' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('favicon', 'Website favicon') !!}
                            <div class="fileUpload">
                                {!! Form::file('logo', ['class'=>'upload']) !!}
                                {!! Form::file('favicon', ['class'=>'upload']) !!}
                                <img src="{{ ($settings->favicon) ? $settings->favicon : '/img/image-placeholder.png' }}">
                            </div>
                        </div>
                    </div>
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
                            {{ $settings->updated_at->format('d M Y \a\t H:i:s') }}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script>
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
