<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog-post', ['post'=>$post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = 'storage/' . request('post_image')->store('images', ['disk' => 'public']);
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('post_create_message', 'Post with title "' . $inputs['title'] . '" was Created');

        return redirect()->route('post.index');
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = 'storage/' . request('post_image')->store('images', ['disk' => 'public']);
            $post->post_simage = inputs[post_image];
        }
        $post->title = $inputs['title'];
        $post->content = $inputs['content'];
        auth()->user()->posts()->save($post);

        //不更改發布者
        // $post->save();
        // $post->update();

        Session::flash('post_update_message', 'Post with title "' . $inputs['title'] . '" was Updated');

        return redirect()->route('post.index');
    }

    public function index()
    {
        if (auth()->user()->isrole('Admin')) {
            $posts = Post::all();
        }else{

        $posts = auth()->user()->posts;
        }
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function delete(Post $post, Request $request)
    {
        $post->delete();
        //Session::flash('message', 'Post was deleted');
        $request->session()->flash('post_delete_message', 'Post with title "' . $post->title . '" was deleted');
        return back();
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post'=>$post]);
    }
}
