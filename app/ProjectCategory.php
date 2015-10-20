<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
