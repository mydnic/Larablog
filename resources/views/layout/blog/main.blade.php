<!DOCTYPE html>
<html lang="@yield('meta-lang', 'en')">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ $setting->favicon }}" type="image/png"/>

        <title>@yield('meta-title', $setting->app_name)</title>

        <meta name="description" content="@yield('meta-description', $setting->description_baseline)">
        <meta name="keywords" content="@yield('meta-keywords', 'blog, portfolio')">
        <meta name="author" content="{{ $setting->app_name }}">
        <meta property="og:title" content="@yield('meta-title', $setting->app_name)"/>
        <meta property="og:url" content="@yield('meta-url', route('home'))"/>
        <meta property="og:image" content="@yield('meta-image', asset($setting->banner))"/>
        <meta property="og:site_name" content="{{ $setting->app_name }}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:description" content="@yield('meta-description', $setting->description_baseline)">

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ elixir('css/blog.css') }}" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        @include('widgets.google_analytics')
        @include('layout.blog.menu')

        <header class="intro-header" style="background-image: url(@yield('meta-image', $setting->banner))">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>
                                @yield('meta-title', $setting->app_name)
                            </h1>
                            <hr class="small">
                            <span class="subheading">
                                @yield('meta-subtitle', $setting->app_baseline)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('layout.errors')

        @yield('content')

        <hr>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <ul class="list-inline text-center">
                            @foreach ($links as $link)
                                <li>
                                    <a href="{{ $link->url }}" target="_blank">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa {{ $link->icon }} fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; {{ $setting->app_name }} {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="/js/blog.js"></script>
        @yield('scripts')
    </body>
</html>
