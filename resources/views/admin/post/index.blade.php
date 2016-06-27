@extends('admin.layout')

@section('meta-title', 'Posts')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Posts
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                    Add new
                </a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-striped table-bordered table-hover" id="TablePost">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Categories</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('admin.post.edit', $post->id) }}">
                                    {{ str_limit($post->title, 40) }}
                                </a>
                            </td>
                            <td>
                                {{ $post->status }}
                            </td>
                            <td>
                                @foreach ($post->categories as $category)
                                    {{ $category->name }}<span class="coma">,</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $post->created_at->format('Y-m-d \a\t H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i>
                    Categories
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('admin.category.edit', $category->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {{ $category->name }} ({{ $category->posts()->count() }})
                                <span class="pull-right text-muted">
                                    <a href="{{ route('admin.category.delete', $category->id) }}" class="confirm-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    {!! Form::open(['route' => 'admin.category.store']) !!}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Add new category']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#TablePost').dataTable({
                "order": [[ 3, "desc" ]]
            });
        });
    </script>
@stop
