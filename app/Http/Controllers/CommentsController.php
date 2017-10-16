<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment, App\Article;
use Session;
use Validator;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    	$validate = Validator::make($request->all(), Comment::valid());
    	if ($validate->fails()){
    		return redirect('articles/'.$request->article_id)
    			->withErrors($validate)
    			->withInput();
    	}else{
    		Comment::create($request->all());
    		Session::flash('notice', "Your Comment has been added");
    		return redirect('articles/'.$request->article_id);
    	}
    }
}
