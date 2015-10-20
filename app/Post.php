<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait, SearchableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $searchable = [
        'columns' => [
            'title'   => 10,
            'content' => 7,
        ],
    ];

    protected $fillable = ['title', 'content', 'status', 'lang', 'image', 'allow_comments', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getPictureAttribute()
    {
        if (empty($this->image)) {
            return '/uploads/'.Setting::first()->banner;
        }

        return '/uploads/'.$this->image;
    }
}
