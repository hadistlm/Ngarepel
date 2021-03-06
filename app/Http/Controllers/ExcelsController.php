<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExcelRequest;
use App\Article;
use Carbon\Carbon;
use Excel, Session, DateTime;

class ExcelsController extends Controller
{
    public function export($id)
    {
    	$data = Article::where('id', $id)->first();
    	$filename = "file_".str_random(5)."_".$data->writer;

    	$dataArray = [
    		'Writer' => $data->writer, 
    		'Title' => $data->title, 
    		'Content' => $data->content
    	];

    	Excel::create($filename, function($excel) use ($dataArray){
    		$excel->setTitle('Export');
    		$excel->setCreator('Ngarepel.dev');
    		$excel->setDescription('Articles Export');

    		$excel->sheet('sheet1', function($sheet) use ($dataArray) {
            	$sheet->fromArray($dataArray, null, 'A1', false, true);
        	});
    	})->export('xlsx');
    }

    public function import(ExcelRequest $request)
    {
    	if ($request->hasFile('excel')) {
    		$file = $request->excel;
            $ext = $request->excel->getClientOriginalExtension();
	    	$data = Excel::load($file)->get();

	    	if (!empty($data) && $data->count()) {
	    		foreach ($data->toArray() as $key => $value) {
	    			if (!empty($value)) {
                        if ($ext == 'ods') {
                            foreach ($value as $val) {
                                $insert[]=[
                                    'writer' => $val['writer'],
                                    'title' => $val['title'], 
                                    'content' => $val['content'],
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ];
                            }
                        }else{
    	    				$insert[] = [
    	    					'writer' => $value['writer'],
    	    					'title' => $value['title'], 
    	    					'content' => $value['content'],
    	    					'created_at' => Carbon::now(),
    	    					'updated_at' => Carbon::now()
    	    				];
                        }
	    			}
	    		}
	    	}

	    	if (!empty($insert)) {
	    		Article::insert($insert);
	    		Session::flash("notice", "Articles Success Created");
            	return redirect()->route("articles.index");
	    	}else{
	    		Session::flash("error", "Articles Failed to Create");
            	return redirect()->route("articles.create");
	    	}
    	}else{
    		Session::flash("error", "Are you dumb or what?");
            return redirect()->route("articles.create");
    	}
    }
}
