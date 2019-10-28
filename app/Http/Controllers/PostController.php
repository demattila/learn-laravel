<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$posts= Post::where('owner_id',auth()->id() )->get();

        $posts = auth()->user()->posts;
        return view('post.index',['posts' => $posts]);

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $parameters = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);
        $parameters['owner_id']=auth()->id();

        $post = Post::create($parameters);

        //custom event
        //event(new PostCreated($post));
        // or default event when created

        return redirect('posts');
    }

    public function show(Post $post)
    {
        //may using policy or gate or in route ->middleware(can:) or in blade @can ( amikor pl mindenki latja az oldalt de csak egyeseknek lehet update gomb)
        if ( auth()->user()->can('update',$post) ) ;
//        abort_if($post->owner_id !== auth()->id(),403);

//       $this->authorize('update',$post); // nem oké



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
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
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
