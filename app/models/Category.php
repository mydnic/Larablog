<?php

class Category extends \Eloquent {
	protected $fillable = [];

    public function post()
    {
        return $this->hasMany('Post');
    }
}