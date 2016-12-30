<nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_route('home', $setting->app_name, [], ['class'=>'navbar-brand']) !!}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="nav navbar-nav">
                @foreach ($menus['left'] as $menu)
                    @if ($menu->is_category_dropdown)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ $menu->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        {!! link_to_route('post.category', $category->name, $category->slug) !!}
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    @elseif ($menu->is_search_form)
                        {!! Form::open(['route'=>'post.search', 'class'=>'navbar-form navbar-left', 'method'=>'get']) !!}
                            <div class="input-group">
                                {!! Form::text('q', Request::get('q'), ['class'=>'form-control col-lg-8', 'placeholder'=>'Search']) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        {!! Form::close() !!}

                    @elseif ($menu->is_login_link)
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('logout') }}">Logout</a>
                                    </li>
                                    @if (Auth::user()->superuser)
                                        <li class="divider"></li>
                                        <li>
                                            {!! link_to_route('admin.home', 'Admin') !!}
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('login') }}">
                                    Login
                                </a>
                            </li>
                        @endif

                    @else
                        <li>
                            {!! link_to($menu->url, $menu->name) !!}
                        </li>
                    @endif
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @foreach ($menus['right'] as $menu)
                    @if ($menu->is_category_dropdown)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ $menu->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        {!! link_to_route('post.category', $category->name, $category->slug) !!}
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    @elseif ($menu->is_search_form)
                        {!! Form::open(['route'=>'post.search', 'class'=>'navbar-form navbar-left', 'method'=>'get']) !!}
                            <div class="input-group">
                                {!! Form::text('q', Request::get('q'), ['class'=>'form-control col-lg-8', 'placeholder'=>'Search']) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        {!! Form::close() !!}

                    @elseif ($menu->is_login_link)
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->username }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('logout') }}">Logout</a>
                                    </li>
                                    @if (Auth::user()->superuser)
                                        <li class="divider"></li>
                                        <li>
                                            {!! link_to_route('admin.home', 'Admin') !!}
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('login') }}">
                                    Login
                                </a>
                            </li>
                        @endif

                    @else
                        <li>
                            {!! link_to($menu->url, $menu->name) !!}
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</nav>
