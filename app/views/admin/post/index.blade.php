@extends('layout.admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Posts</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
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
                        <span class="pull-right text-muted small"><em>5 posts</em>
                        </span>
                    </li>
                </ul>
                <!-- /.list-group -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </span>
                    <input type="text" class="form-control" placeholder="Add new category">
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
@stop


@section('scripts')
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });

        var app = angular.module("Categories", [])

        app.controller("CategoriesController", function($scope, $http) {
            $http.get('/category').success(function(categories) {
                $scope.categories = categories;
            });

            $scope.filter = function(id) {
                $scope.RestoId = id;
                $http.get('admin/resto/'+id).success(function(resto) {
                    $scope.resto = resto;
                });
            };

            $scope.update = function(resto) {
                console.log(resto);
                $http.post('admin/resto', resto);
                $http.get('admin/resto').success(function(restos) {
                    $scope.restos = restos;
                });
            };

            $scope.deleteMondayHour = function(hour) {
                var index = $scope.resto.monday.hour.indexOf(hour);
                $scope.resto.monday.hour.splice(index, 1);
            };
            $scope.deleteTuesdayHour = function(hour) {
                var index = $scope.resto.tuesday.hour.indexOf(hour);
                $scope.resto.tuesday.hour.splice(index, 1);
            };
            $scope.deleteWednesdayHour = function(hour) {
                var index = $scope.resto.wednesday.hour.indexOf(hour);
                $scope.resto.wednesday.hour.splice(index, 1);
            };
            $scope.deleteThursdayHour = function(hour) {
                var index = $scope.resto.thursday.hour.indexOf(hour);
                $scope.resto.thursday.hour.splice(index, 1);
            };
            $scope.deleteFridayHour = function(hour) {
                var index = $scope.resto.friday.hour.indexOf(hour);
                $scope.resto.friday.hour.splice(index, 1);
            };
            $scope.deleteSaturdayHour = function(hour) {
                var index = $scope.resto.saturday.hour.indexOf(hour);
                $scope.resto.saturday.hour.splice(index, 1);
            };
            $scope.deleteSundayHour = function(hour) {
                var index = $scope.resto.sunday.hour.indexOf(hour);
                $scope.resto.sunday.hour.splice(index, 1);
            };
        });

    </script>
@stop