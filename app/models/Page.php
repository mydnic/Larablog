<?php

class Page extends \Eloquent {

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

}