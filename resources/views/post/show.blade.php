@extends('layout.blog.main')

@section('meta-title', $post->title)
@section('meta-subtitle', 'Posted by '.link_to_route('user.show', $post->user->username, $post->user->username).' on '.date('M d Y', strtotime($post->created_at)))

@section('styles')
    <link rel="stylesheet" href="https://highlightjs.org/static/styles/monokai_sublime.css">
@stop

@section('content')

    <article>
        <div class="row">
            <div class="col-md-12">
                {!! $post->content !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($post->tags as $tag)
                    {!! link_to_route('tag.show', '#'.$tag->name, $tag->slug) !!}
                @endforeach
            </div>
        </div>
    </article>

    @if ($post->allow_comments)
        <hr>
        @include('widgets.disqus')
    @endif

@stop

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@stop