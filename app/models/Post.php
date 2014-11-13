<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'content', 'status', 'image', 'allow_comments'];

    public static $rules = [
        'title'       => 'required|min:2',
        'content'     => 'required',
        'status'      => 'integer',
        'image'       => 'image|mimes',
        'category_id' => 'required',
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