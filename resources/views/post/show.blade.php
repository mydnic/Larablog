@extends('layout.bootstrap3.main')


@section('header')
    <header class="intro-header" style="background-image: url({{$post->picture}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>
                            {{ $post->title }}
                        </h1>
                        <span class="meta">Posted by {!! link_to_route('user.show', $post->user->username, $post->user->username) !!} on {{ date('M d Y', strtotime($post->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop


@section('content')

    <article>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! $post->content !!}
            </div>
            </div>
    </article>

@stop