@extends('layout.bootstrap3.main')

@section('meta-title', $post->title)
@section('meta-subtitle', 'Posted by '.link_to_route('user.show', $post->user->username, $post->user->username).' on '.date('M d Y', strtotime($post->created_at)))

@section('content')

    <article>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! $post->content !!}
            </div>
        </div>
    </article>

@stop