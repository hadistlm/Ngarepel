<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Datatables;

class DataController extends Controller
{
	public function index()
	{
		return view('vendor.dataList');
	}

	public function data()
	{
		$data = Article::all();

		return Datatables::of($data)
		->addColumn('action', function($data){
			return "<a class='btn btn-block btn-info' href=".route('articles.show',$data->id).">Edit</a>";
		})
		->editColumn('content', function ($data) {
            return str_limit($data->content, 150);
        })
        ->make(true);
	}
}
