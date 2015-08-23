@extends('layout.admin.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Your website settings
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::model($settings, ['route'=>'admin.settings.store', 'class'=>'form-horizontal', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('app_name', 'Website name', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('app_name', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('app_baseline', 'Website Baseline', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('app_baseline', null, ['class'=>'form-control', 'placeholder'=>'Awesome blog']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('disqus_shortname', 'Disqus Shortname', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('disqus_shortname', null, ['class'=>'form-control', 'placeholder'=>'xxxxxxxxxx']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('google_analytics_code', 'Google Analytics Code', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('google_analytics_code', null, ['class'=>'form-control', 'placeholder'=>'UA-XXXXXX-X']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('banner', 'Website Banner', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10 fileUpload">
                        {!! Form::file('banner', ['class'=>'upload', 'id'=>'banner_file_upload']) !!}
                        <img src="/uploads/{{$settings->banner}}" alt="">
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('logo', 'Website logo', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10 fileUpload">
                        {!! Form::file('logo', ['class'=>'upload', 'id'=>'logo_file_upload']) !!}
                        <img src="/uploads/{{$settings->logo}}" alt="">
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('favicon', 'Website favicon', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10 fileUpload">
                        {!! Form::file('favicon', ['class'=>'upload', 'id'=>'favicon_file_upload']) !!}
                        <img src="/uploads/{{$settings->favicon}}" alt="">
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('post_bottom_scripts', 'Special script to add at the bottom of your posts', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('post_bottom_scripts', null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
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