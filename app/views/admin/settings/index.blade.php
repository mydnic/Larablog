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
            {{ Form::model($settings, ['route'=>'admin.settings.store', 'class'=>'form-horizontal']) }}
                <div class="form-group">
                    {{ Form::label('app_name', 'Website name', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('app_name', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
                    </div>
                </div>
                
                <div class="form-group">
                    {{ Form::label('app_baseline', 'Website Baseline', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('app_baseline', null, ['class'=>'form-control', 'placeholder'=>'Awesome blog']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop