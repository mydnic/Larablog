<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Roumen\Feed\Facades\Feed;

class FeedController extends Controller
{
    public function getRss()
    {
        // create new feed
        $feed = Feed::make();
        $setting = Setting::first();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60);

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached()) {
            // creating rss feed with our most recent 20 posts
            $posts = DB::table('posts')->where('status', 'published')->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title       = $setting->app_name;
            $feed->description = $setting->app_baseline;
            $feed->logo        = $setting->logo;
            $feed->link        = route('rss');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->created_at;
            $feed->lang    = 'en';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post) {
                // set item's title, author, url, pubdate, description and content
                $feed->add($post->title, $post->author, route('post.show', $post->slug), $post->created, $post->description, $post->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }
}
