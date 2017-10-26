<?php

namespace App\Transformer;

/**
* 
*/
class TaskTransformer
{
	public function transform($tasks)
	{
		return [
			'id' => $tasks->id,
			'task' => $tasks->name,
			'description' => $tasks->description
		];
	}
}