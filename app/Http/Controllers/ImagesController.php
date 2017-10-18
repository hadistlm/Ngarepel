<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article, App\Photo;
use Session, Storage;

class ImagesController extends Controller
{   
    public function addImage(Request $request, $id)
    {
        try {
            if ($request->hasFile('file')) {
                foreach ($request->file as $data) {
                    $num = "file_".str_random(6). '.' . $data->extension();
                    $data->storeAs('public/article_photos', $num);
                    Photo::create([
                        'article_id' =>  $id,
                        'file' => $num
                    ]);
                }
                Session::flash("notice", "Upload new image success");
            }else{
                Session::flash('error', "Gagal");
            }
            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('error', $e);
            return redirect()->back();
        }
    }

    public function changeImage(Request $request, $id)
    {
    	try {

    		$data = Photo::where('id',$id)->get();

    		if ($request->hasFile('file')) {
	            $num = "file_".str_random(6).'.' . $request->file('file')->extension();
	            $request->file('file')->storeAs('public/article_photos', $num);
	            
                Photo::find($id)->update(['file'=>$num]);
	            Storage::delete('public/article_photos/'.$data[0]->file);
	            
        		Session::flash('notice', "Success Update Image");
        	}else{
        		Session::flash('error', "Failed Change Image");	
        	}
        	return redirect()->back();
    	} catch (Exception $e) {
    		Session::flash('error', $e);
    		return redirect()->back();
    	}
    }

    public function deleteImage($id)
    {
        try {
            $data = Photo::where('id', $id)->get();
            
            $fstexec = Storage::delete('public/article_photos/'.$data[0]->file);
            $sndexec = Photo::where('id', $id)->delete();
            
            if ($fstexec && $sndexec) {
               Session::flash('notice', "Your image has been deleted");
            }else{
                Session::flash('error', "Failed delete image");
            }

            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('error', $e);
            return redirect()->back();
        }
    }
}
