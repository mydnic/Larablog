<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Post extends Model implements SluggableInterface
{
    use SoftDeletes, SluggableTrait, Eloquence;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $searchableColumns = ['title', 'content', 'tags.name'];

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
}
