<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //


    public function show(Post $post)
    {
        return view('layouts/blog-post', ['post' => $post]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        // $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'


        ]);


        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        $post = Post::class;

        auth()->user()->posts()->create($inputs);




        // posts()->create($inputs);



        // session()->flash('post-created-message', 'Post with title was created '. $inputs['title']);

        // return redirect()->route('post.index');

        return back();
    }
}
