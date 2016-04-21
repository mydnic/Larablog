@extends('layout.admin.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tasks
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tasks">
                 <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-list"></span> Sortable Lists
                        <div class="pull-right action-buttons">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox" />
                                    <label for="checkbox">
                                        List group item heading
                                    </label>
                                </div>
                                <div class="pull-right action-buttons">
                                    <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox2" />
                                    <label for="checkbox2">
                                        List group item heading 1
                                    </label>
                                </div>
                               <div class="pull-right action-buttons">
                                    <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox3" />
                                    <label for="checkbox3">
                                        List group item heading 2
                                    </label>
                                </div>
                                <div class="pull-right action-buttons">
                                    <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox4" />
                                    <label for="checkbox4">
                                        List group item heading 3
                                    </label>
                                </div>
                                <div class="pull-right action-buttons">
                                    <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox5" />
                                    <label for="checkbox5">
                                        List group item heading 4
                                    </label>
                                </div>
                               <div class="pull-right action-buttons">
                                    <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>
                                    Total Count <span class="label label-info">25</span></h6>
                            </div>
                            <div class="col-md-6">
                                <ul class="pagination pagination-sm pull-right">
                                    <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                    <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="http://www.jquery2dotnet.com">2</a></li>
                                    <li><a href="http://www.jquery2dotnet.com">3</a></li>
                                    <li><a href="http://www.jquery2dotnet.com">4</a></li>
                                    <li><a href="http://www.jquery2dotnet.com">5</a></li>
                                    <li><a href="javascript:void(0)">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
