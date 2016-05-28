<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('meta-title', 'Dashboard')</title>

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/yeti/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet">
        <link href="/js/lib/wysiwyg/ui/trumbowyg.min.css" rel="stylesheet">
        <link href="/js/lib/magicsuggest/jquery.tags.css" rel="stylesheet">
        <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('admin.home') }}">
                        Dashboard
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="admin_nav">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('home') }}">
                                Back to Website
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/post*') ? 'active' : '' }}" href="{{ route('admin.post.index') }}">
                                <i class="fa fa-comment fa-fw"></i>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/page*') ? 'active' : '' }}" href="{{ route('admin.page.index') }}">
                                <i class="fa fa-pencil fa-fw"></i>
                                Pages
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/project*') ? 'active' : '' }}" href="{{ route('admin.project.index') }}">
                                <i class="fa fa-briefcase fa-fw"></i>
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/menu') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
                                <i class="fa fa-th-list fa-fw"></i>
                                Menu
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/task') ? 'active' : '' }}" href="{{ route('admin.task.index') }}">
                                <i class="fa fa-tasks fa-fw"></i>
                                Tasks
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/settings') ? 'active' : '' }}" href="{{ route('admin.settings.edit', 1) }}">
                                <i class="fa fa-cogs fa-fw"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/social') ? 'active' : '' }}" href="{{ route('admin.social.index') }}">
                                <i class="fa fa-cogs fa-fw"></i>
                                Social Links
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @include('layout.errors')
            @yield('content')
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="/js/lib/wysiwyg/trumbowyg.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/base64/trumbowyg.base64.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/colors/trumbowyg.colors.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/noembed/trumbowyg.noembed.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/pasteimage/trumbowyg.pasteimage.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/preformatted/trumbowyg.preformatted.min.js"></script>
        <script src="/js/lib/wysiwyg/plugins/upload/trumbowyg.upload.min.js"></script>
        <script src="/js/lib/magicsuggest/jquery.tags.js"></script>
        <script src="/js/lib/jquery.sortable.js"></script>
        <script src="/js/admin.js"></script>
        @yield('scripts')
    </body>
</html>
