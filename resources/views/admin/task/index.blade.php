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
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            {!! Form::model($task, ['route' => ['admin.task.update', $task->id], 'method' => 'put']) !!}
                                <td>
                                    {{ $task->title }}
                                </td>
                                <td class="text-center">
                                    {!! Form::input('range', 'completion', null, ['class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
                                    <strong>{{ $task->completion }}%</strong>
                                </td>
                                <td class="text-center">
                                    {!! Form::input('number', 'priority', null, ['class' => 'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-xs']) !!}
                                    <a href="{{ route('admin.task.toggle', $task->id) }}" class="btn btn-info btn-xs">
                                        {{ $task->completed ? 'Reopen' : 'Close' }}
                                    </a>
                                    <a href="{{ route('admin.task.delete', $task->id) }}" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            {!! Form::close() !!}
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
