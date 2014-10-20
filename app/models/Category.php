<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];

    public function post()
    {
        return $this->hasMany('Post');
    }
}