<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MartinBean\Database\Eloquent\Sluggable;

class Project extends Model {

	use SoftDeletes, Sluggable;
    const DISPLAY_NAME = 'title';

    public function categories()
    {
        return $this->belongsToMany('App\ProjectCategory');
    }

    public function images()
    {
        return $this->hasMany('App\ProjectImage');
    }

    public function getImagePathAttribute()
    {
        return '/uploads/'.$this->image;
    }

}
