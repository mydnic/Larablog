<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use MartinBean\Database\Eloquent\Sluggable;

class ProjectCategory extends Model {

    use Sluggable;

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

}
