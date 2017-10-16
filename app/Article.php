<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
    protected $fillable = [
        'title','content','writer'
    ];

    public function valid()
    {
    	return array(
    		'content'=>'required'
    	);
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment', 'article_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo', 'article_id');
    }
}

