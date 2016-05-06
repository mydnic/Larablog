@extends('admin.layout')

@section('styles')
    <style>
    #TableProject span.coma:last-child {
        display: none;
    }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Projects
                <small>
                    {!! link_to_route('admin.project.create', 'Add New') !!}
                </small>
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
                            <td>{{ date('Y-m-d \a\t H:i:s' , strtotime($project->created_at)) }}</td>
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
        <div class="col-lg-3" ng-app="Categories">
            <div class="panel panel-default" ng-controller="CategoriesController" >
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i> Categories
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item" ng-repeat="category in categories">
                            @{{ category.name }}
                            <span class="pull-right text-muted small">
                                <span ng-click="delete(category)"><i class="fa fa-trash"></i></span>
                            </span>
                        </li>
                    </ul>
                    <!-- /.list-group -->
                    <form ng-submit="addCategory()">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                            <input type="text" class="form-control" ng-model="newCategoryText" placeholder="Add new category">
                        </div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#TableProject').dataTable();
        });

        var app = angular.module("Categories", [])

        app.controller("CategoriesController", function($scope, $http) {
            $http.get('/api/v1/admin/projectcategory').success(function(categories) {
                $scope.categories = categories;
            });

            $scope.addCategory = function() {
                var category = {
                    name: $scope.newCategoryText,
                };
                $http.post('/api/v1/admin/projectcategory', category);
                $scope.categories.push(category);
                $scope.newCategoryText = null;
            };

            $scope.delete = function(category) {
                var index = $scope.categories.indexOf(category);
                $scope.categories.splice(index, 1);
                $http.post('/api/v1/admin/projectcategory/delete', category);
            }
        });

    </script>
@stop
