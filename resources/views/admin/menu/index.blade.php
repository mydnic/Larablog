@extends('layout.admin.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Menu
            </h1>
        </div>
    </div>

    <div class="row" ng-app="Menus">
        <div ng-controller="MenuController">
            <div class="col-md-3">
                <div class="well">
                    <h4>Registered Pages :</h4>
                    @if ($pages->count())
                        <ul class="list-unstyled">
                            @foreach ($pages as $key => $page)
                                <li>
                                    {{ $page->title }}
                                    <span class="pull-right"><i class="fa fa-plus-circle"></i></span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        No pages yet. {!! link_to_route('admin.page.create', 'Add one') !!}
                    @endif
                    <hr>
                    <h4>Custom Link :</h4>
                    <form ng-submit="addCategory()" class="link">
                        <input ng-model="newMenuName" type="text" class="form-control" placeholder="Name">
                        <input ng-model="newMenuUri" type="text" class="form-control" placeholder="URI" value="/">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="">
                    <h3>Your Menu :</h3>
                    <div class="row" ng-repeat="menu in menus">
                        <div class="col-md-6">
                            @{{ menu.name }}
                        </div>
                        <div class="col-md-6">
                            @{{ menu.uri }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>

        var app = angular.module("Menus", [])

        app.controller("MenuController", function($scope, $http) {
            $http.get('/api/v1/menu').success(function(menus) {
                $scope.menus = menus;
            });

            $scope.addMenu = function() {
                var menu = {
                    name: $scope.newMenuName,
                    uri: $scope.newMenuUri,
                };
                $http.post('/api/v1/menu', menu);
                $scope.menus.push(menu);
                $scope.newMenuName = null;
                $scope.newMenuUri = null;
            };

            $scope.delete = function(category) {
                var index = $scope.categories.indexOf(category);
                $scope.categories.splice(index, 1);
                $http.post('/category/delete', category);
            }
        });

    </script>
@stop