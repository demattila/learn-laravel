<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Task;

class PostTaskController extends Controller
{
    public function update(Request $request, Task $task){

        $task->update([
            'completed' => $request->has('completed')
        ]);

        return back();
    }

    public function store(Request $request,Post $post){

        $attributes = $request->validate([
            'description' => 'required|min:3'
        ]);

        $post->addTask($attributes);

        return back();
    }

}
