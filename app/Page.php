<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MartinBean\Database\Eloquent\Sluggable;

class Page extends Model {

    use SoftDeletes, Sluggable;
    const DISPLAY_NAME = 'title';

	protected $fillable = ['title', 'content', 'image'];

    public static $rules = [
        'title'   => 'required|min:2',
        'content' => 'required',
        'image'   => 'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
