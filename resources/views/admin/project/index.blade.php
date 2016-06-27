@extends('admin.layout')

@section('meta-title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Projects
                <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
                    Add new
                </a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-striped table-bordered table-hover" id="TableProject">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Created at</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                {!! link_to_route('admin.project.edit', $project->title, $project->id) !!}
                            </td>
                            <td>
                                @foreach ($project->categories as $category)
                                    {{ $category->name }}<span class="coma">,</span>
                                @endforeach
                            </td>
                            <td>{{ $project->created_at->format('Y-m-d \a\t H:i:s') }}</td>
                            <td>
                                @if ($project->published)
                                    {!! link_to_route('admin.project.unpublish', 'Yes', $project->id, ['class'=>'btn btn-success btn-xs']) !!}
                                @else
                                    {!! link_to_route('admin.project.publish', 'No', $project->id, ['class'=>'btn btn-danger btn-xs']) !!}
                                @endif
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
                                <a href="{{ route('admin.project_category.edit', $category->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {{ $category->name }} ({{ $category->projects()->count() }})
                                <span class="pull-right text-muted">
                                    <a href="{{ route('admin.project_category.delete', $category->id) }}" class="confirm-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    {!! Form::open(['route' => 'admin.project_category.store']) !!}
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
            $('#TableProject').dataTable({
                "order": [[ 2, "desc" ]]
            });
        });
    </script>
@stop
