@extends('layout.blog.main')

@section('meta-title', $post->title)
@section('meta-subtitle', 'Posted by ' . link_to_route('user.show', $post->user->username, $post->user->username) . ' on ' . date('M d Y', strtotime($post->created_at)))
@if ($post->image)
    @section('meta-image', url($post->image))
@endif
@section('meta-description', str_limit(strip_tags($post->content), 140))
@section('meta-url', route('post.show', $post->slug))
@section('meta-lang', $post->lang)
@section('meta-keywords', $keywords)

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/monokai_sublime.min.css">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <article>
                    @if ($post->created_at < $post->updated_at)
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <em><small>This article was last updated on : {{ $post->updated_at->format('M d Y') }}</small></em>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($post->tags as $tag)
                                {!! link_to_route('tag.show', '#' . $tag->name, $tag->slug) !!}
                            @endforeach
                        </div>
                    </div>
                </article>

                <hr>
                @include('widgets.post_bottom_scripts')

                @if ($post->allow_comments)
                    <hr>
                    @include('widgets.disqus')
                @endif
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@stop
