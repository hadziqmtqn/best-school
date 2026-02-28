<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function page(Post $post): View
    {
        $title = $post->title;

        return \view('home.post.page', compact('title', 'post'));
    }
}
