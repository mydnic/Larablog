<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'content', 'image'];

    public static $rules = [
        'title'   => 'required|min:2',
        'content' => 'required',
        'image'   => 'image|mimes',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function categories()
    {
        return $this->belongsToMany('Category');
    }
}