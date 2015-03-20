<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use MartinBean\Database\Eloquent\Sluggable;

class Tag extends Model {

	use Sluggable;

    public function categories()
    {
        return $this->belongsTo('App\Post');
    }

}
