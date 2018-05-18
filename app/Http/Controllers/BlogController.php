<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index() {
        $blogs = Post::published()->orderBy('published_at')->paginate();
        return view('blog.index', compact('blogs'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

}
