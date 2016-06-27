@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tasks
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Completion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                {{ $task->completion }}%
                            </td>
                            <td>
                                <a href="{{ route('admin.task.toggle', $task->id) }}" class="btn btn-info btn-xs">
                                    {{ $task->completed ? 'Reopen' : 'Close' }}
                                </a>

                                <a href="{{ route('admin.task.delete', $task->id) }}" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Quick Task Creation
                    </h3>
                </div>
                {!! Form::open(['route' => 'admin.task.store']) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
