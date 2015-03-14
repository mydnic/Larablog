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

    @if ($post->allow_comments)
        <hr>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES * * */
            var disqus_shortname = '{{$setting->disqus_shortname}}';
            
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    @endif

@stop