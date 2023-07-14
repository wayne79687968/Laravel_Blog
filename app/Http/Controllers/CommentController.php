<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store()
    {
        $inputs = request()->validate([
            'posts_id' => 'required',
            'content' => 'required'
        ]);

        auth()->user()->comments()->create($inputs);

        return back();
    }
}
