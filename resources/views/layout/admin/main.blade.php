<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('meta-title', 'Admin Panel - ')</title>

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="/admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="/admin/css/plugins/timeline.css" rel="stylesheet">
        <link href="/admin/css/sb-admin-2.css" rel="stylesheet">
        <link href="/admin/css/plugins/morris.css" rel="stylesheet">
        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('admin/index') }}">Admin</a>
                </div>

                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}">
                            View Site
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user fa-fw"></i>
                                    User Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-gear fa-fw"></i>
                                    Settings
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{ url('logout') }}">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a class="{{ Request::is('admin/index') ? 'active' : '' }}" href="{{ URL::to('admin/index') }}">
                                    <i class="fa fa-dashboard fa-fw"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/post*') ? 'active' : '' }}" href="{{ URL::route('admin.post.index') }}">
                                    <i class="fa fa-comment fa-fw"></i>
                                    Posts
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/page*') ? 'active' : '' }}" href="{{ URL::route('admin.page.index') }}">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    Pages
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/project*') ? 'active' : '' }}" href="{{ URL::route('admin.project.index') }}">
                                    <i class="fa fa-briefcase fa-fw"></i>
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/menu') ? 'active' : '' }}" href="{{ URL::route('admin.menu.index') }}">
                                    <i class="fa fa-th-list fa-fw"></i>
                                    Menu
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/task') ? 'active' : '' }}" href="{{ URL::route('admin.task.index') }}">
                                    <i class="fa fa-tasks fa-fw"></i>
                                    Tasks
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/settings') ? 'active' : '' }}" href="{{ URL::route('admin.settings.index') }}">
                                    <i class="fa fa-cogs fa-fw"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('admin/settings/social') ? 'active' : '' }}" href="{{ URL::route('admin.settings.social.index') }}">
                                    <i class="fa fa-cogs fa-fw"></i>
                                    Social Links
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                @include('layout.errors')
                @yield('content')
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="/admin/js/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="/admin/js/sb-admin-2.js"></script>
        @yield('scripts')
    </body>
</html>
