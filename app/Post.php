<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MartinBean\Database\Eloquent\Sluggable;

class Post extends Model {

    use SoftDeletes, Sluggable;
    const DISPLAY_NAME = 'title';

	protected $fillable = ['title', 'content', 'status', 'image', 'allow_comments'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

}
