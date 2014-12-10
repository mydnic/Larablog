@extends('layout.admin.main')


@section('styles')
    <style>
    #TablePost span.coma:last-child {
        display: none;
    }
    </style>
@stop


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Posts
            <small><a href="{{ URL::to('admin/post/create') }}">Add new</a></small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="TablePost">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Categories</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @each('admin.post.single', $posts, 'post', 'admin.post.empty')
                </tbody>
            </table>
        </div>
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
    <script src="/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#TablePost').dataTable();
        });

        var app = angular.module("Categories", [])

        app.controller("CategoriesController", function($scope, $http) {
            $http.get('/api/v1/category').success(function(categories) {
                $scope.categories = categories;
            });

            $scope.addCategory = function() {
                var category = {
                    name: $scope.newCategoryText,
                };
                $http.post('/category', category);
                $scope.categories.push(category);
                $scope.newCategoryText = null;
            };

            $scope.delete = function(category) {
                var index = $scope.categories.indexOf(category);
                $scope.categories.splice(index, 1);
                $http.post('/category/delete', category);
            }
        });

    </script>
@stop