<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article, App\Photo;
use App\Http\Requests\ArticleRequest;
use Session;
use Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::All();

        return view('vendor.index')->with('articles', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create = true;
        return view("vendor.create")->with('create', $create);
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
        $create = false;

        return view("vendor.edit", compact('article','create','photos'));
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
        Article::find($id)->update($request->all());
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
