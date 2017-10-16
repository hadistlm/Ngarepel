<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'content','user','article_id'
	];

    public static function valid()
    {
        return array(
            'content'=>'required','user'=>'required'
        );
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

}
