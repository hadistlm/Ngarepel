<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment, App\Article;
use Session, Validator;

class CommentsController extends Controller
{
    public function store(Request $request)
    {   
        $comments = Article::find($request->input('article_id'))->comments->sortBy('Comment.created_at');
        $view = (String) view('vendor.inside.comlist')->with('comments', $comments)->render();

        if ($request->ajax()) {
            $validate = Validator::make($request->all(), [
                'content'=>'required',
                'user' => 'required'
            ]);

            if ($validate->fails()){
                return response()->json(['view'=>$view, 'status'=>'fails']);
            }else{
                Comment::create($request->all());
                return response()->json(['view'=>$view, 'status'=>'success']);
            }
            /*
            $validate = Validator::make($request->all(), Comment::valid());
            if ($validate->fails()){
                return redirect('articles/'.$request->article_id)
                    ->withErrors($validate)
                    ->withInput();
            }else{
                Comment::create($request->all());
                Session::flash('notice', "Your Comment has been added");
                return response()->json(['status'=>'success']);
            }*/
        }
    }
}
