@extends('layout.blog.main')

@section('meta-title', $page->title)
@section('meta-subtitle', 'Posted by ' . link_to_route('user.show', $page->user->username, $page->user->username) . ' on ' . date('M d Y', strtotime($page->created_at)))
@section('meta-image', url($page->image))
@section('meta-description', str_limit(strip_tags($page->content), 140))
@section('meta-url', route('page.show', $page->slug))
@section('meta-lang', $page->lang)

@section('styles')
    <link rel="stylesheet" href="https://highlightjs.org/static/styles/monokai_sublime.css">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <article>
                    @if ($page->created_at < $page->updated_at)
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <em><small>This page was last updated on : {{ $page->updated_at->format('M d Y') }}</small></em>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            {!! $page->content !!}
                        </div>
                    </div>
                </article>
                
                <hr>
                @include('widgets.post_bottom_scripts')

                @if ($page->allow_comments)
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
