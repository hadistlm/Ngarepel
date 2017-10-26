<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Task, App\Transformer\TaskTransformer, Sentinel;

class TaskController extends Controller
{
	protected $response;

    function __construct(Response $response)
    {
    	$this->response = $response;
    }

    public function index()
    {
    	$tasks = Task::paginate(5);
    	return $this->response->withPaginator($tasks, new TaskTransformer());
    }

    public function show($id)
    {
    	$tasks = Task::find($id);

    	if (!$tasks) {
    		return $this->response->errorNotFound('Task Not Found');
    	}
    	return $this->response->withItem($tasks, new TaskTransformer());
    }

    public function destroy($id)
    {
    	$tasks = Task::find($id);
		
		if (!$tasks) {
			return $this->response->errorNotFound('Task Not Found');
		}
		
		if($tasks->delete()) {
			return $this->response->withItem($tasks, new TaskTransformer());
		} else {
			return $this->response->errorInternalError('Could not delete a task');
		}
    }

    public function store(Request $request)
    {
    	if ($request->isMethod('put')) {
    		$tasks = Task::find($request->task_id);
    		if (!$tasks) {
    			return $this->response->errorNotFound('Task Not Found');
    		}
    	} else {
    		$tasks = new Task;
    	}
    	
    	//$tasks->id = $request->input('task_id');
		$tasks->name = $request->input('name');
		$tasks->description = $request->input('description');
		$tasks->user_id = 1; //$request->user()->id;

		if($tasks->save()) {
			return $this->response->withItem($tasks, new TaskTransformer());
		} else {
			return $this->response->errorInternalError('Could not updated/created a task');
		}
    }
}
