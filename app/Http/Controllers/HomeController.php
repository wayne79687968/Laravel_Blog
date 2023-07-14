<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (request('c')) {
            $posts = Post::where('category', request('c'))->orderByDesc('id')->get();
        } else {
            $posts = Post::orderByDesc('id')->get();
        }

        return view('home', ['posts' => $posts]);
    }
}
