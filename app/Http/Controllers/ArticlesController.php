<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article, App\Photo;
use Session, Storage, Sentinel, Validator;

class ArticlesController extends Controller
{
    function __construct()
    {
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $articles = Article::where('title', 'like', '%'.$request->keywords.'%')->orWhere('content', 'like', '%'.$request->keywords.'%');
            if ($request->direction) {
                $articles = $articles->orderBy('id', $request->direction);
            }
            
            $articles = $articles->paginate(5);
            $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';
            $request->keywords == '' ? $keywords = '' : $keywords = $request->keywords;

            $view = (String) view('vendor.list')->with('articles', $articles)->render();
            return response()->json(['view' => $view, 'direction' => $direction, 'keywords'=>$keywords, 'status'=>'success']);
        }else{
            $article = Article::paginate(5);

            return view('vendor.index')->with('articles', $article);   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create = true;
        $writer = Sentinel::check();

        return view("vendor.create", compact('writer','create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try {
            $article = Article::create($request->all());

            if ($request->hasFile('file')) {
                foreach ($request->file as $data) {
                    $num = "file_".str_random(6). '.' . $data->extension();
                    $data->storeAs('public/article_photos', $num);
                    Photo::create([
                        'article_id' =>  $article->id,
                        'file' => $num
                    ]);
                }
            }
            
            Session::flash("notice", "Articles Success Created");
            return redirect()->route("articles.index");
        } catch (Exception $e) {
            Session::flash("error", $e);
            return redirect()->route("articles.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        $photos = Article::find($id)->photos->sortBy('Photo.created_at');
        $create = true;
        $i = 0;
        $j = 0;

        return view("vendor.show")
            ->with("article", $article)
            ->with("comments", $comments)
            ->with("photos", $photos)
            ->with('create', $create)
            ->with("i", $i)
            ->with("j", $j);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $photos = Article::find($id)->photos->sortBy('Photo.created_at');
        $writer = Sentinel::check();
        $create = false;

        return view("vendor.edit", compact('article','create','photos', 'writer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Article::find($id)->update(array('title'=>$request->title, 'content'=>$request->content));
        Session::flash("notice", "Article Success Updated");
        return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = \App\Photo::where('article_id', $id)->get();

            if(!empty($data)){
                foreach ($data as $key) {
                    Storage::delete('public/article_photos/'.$key->file);
                }
                Photo::where('article_id', $id)->delete();
            }

            Article::destroy($id);
            Session::flash('notice', "Article Success Deleted");
            return redirect()->route("articles.index");
        } catch (Exception $e) {
            Session::flash('error', $e);
            return redirect()->route("articles.index");
        }
        
    }
}
