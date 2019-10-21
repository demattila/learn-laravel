<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts= Post::all();

        //return view('post.index')->withPosts($posts);
        return view('post.index',['posts' => $posts]);

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required',
//            'description' => 'required',
//        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();

        //Post::create(['name' => $request->name,'description' => $request->description]);
        return redirect('posts');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //$post = Post::where('id',$id)->first();
        dump($post->toArray());
        return view('post.edit',compact('post', $post));
    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'title' => 'required',
//            'description' => 'required',
//        ]);

        $update = ['name' => $request->name, 'description' => $request->description];
        Post::where('id',$id)->update($update);

        return redirect('posts');
    }

    public function destroy(Request $request, Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $e) {}
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('posts');
    }
}
