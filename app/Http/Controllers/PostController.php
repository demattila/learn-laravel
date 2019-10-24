<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts= Post::where('owner_id',auth()->id() )->get();

        //return view('post.index')->withPosts($posts);
        return view('post.index',['posts' => $posts]);

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        //$parameters['owner_id']=auth()->id();
        //Post::create($parameters);

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->owner_id = auth()->id();                      ////why ?
        $post->save();


        return redirect('posts');
    }

    public function show(Post $post)
    {
        //may using policy or gate
        abort_if($post->owner_id !== auth()->id(),403);

        return view('post.show',['post' => $post]);
    }

    public function edit(Post $post)
    {
        dump($post->toArray());

        return view('post.edit',compact('post', $post));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $update = ['name' => $request->name, 'description' => $request->description];
        Post::where('id',$id)->update($update);

        $request->session()->flash('message', 'Successfully updated the post!');
        return redirect('posts');
    }

    public function destroy(Request $request, Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $e) {}
        $request->session()->flash('message', 'Successfully deleted the post!');
        return redirect('posts');
    }
}
