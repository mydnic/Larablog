<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use MartinBean\Database\Eloquent\Sluggable;

class Category extends Model {

    use Sluggable;

	protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
