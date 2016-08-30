@extends('admin.layout')

@section('meta-title', 'Edit Category')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Category
            </h1>
        </div>
    </div>
    {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'put']) !!}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) !!}
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
                            {{ $category->updated_at->format('d M Y \a\t H:i:s') }}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="{{ route('admin.category.delete', $category->id) }}" class="text-danger confirm-delete btn btn-link">
                            Delete category
                        </a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
