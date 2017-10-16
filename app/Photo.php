<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'file','article_id'
    ];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}
