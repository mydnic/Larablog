@extends('layout.bootstrap3.main')

@section('header')
    <header class="intro-header" style="background-image: url(/uploads/{{ $setting->banner }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>
                            {{ $setting->app_name }}
                        </h1>
                        <hr class="small">
                        <span class="subheading">
                            {{ $setting->app_baseline }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')

    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="{{ URL::route('post.show', $post->slug) }}">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                    {{ strip_tags($post->content) }}
                </h3>
            </a>
            <p class="post-meta">Posted by {!! link_to_route('user.show', $post->user->username, $post->user->username) !!} on {{ date('M d Y', strtotime($post->created_at)) }}</p>
        </div>
    @endforeach

@stop