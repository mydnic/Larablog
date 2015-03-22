@extends('layout.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/wysiwyg/dist/ui/trumbowyg.min.css">
    <style>
        input[name=title]{
            border: 0px;
            outline: none;
        }
        .trumbowyg-box{
            width: 100%;
        }
    </style>
@stop

@section('content')
{!! Form::open(['route'=>'admin.page.store']) !!}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!! Form::text('title', null, ['placeholder'=>'Title of the page']) !!}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            {!! Form::textarea('content', null) !!}
        </div>
        <div class="col-lg-3">
            <div class="well">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', ['0'=>'Draft', '1'=>'Published'], '0', ['class'=>'form-control']) !!}
                </div>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('allow_comments', null, true, []) !!} Allow Comments
                    </label>
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
    <script>
        $('textarea').trumbowyg({
            autogrow: true,
            btnsAdd: ['base64']
        });
    </script>
@stop