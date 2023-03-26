<?php

namespace App\Http\Controllers\Post;




use App\Models\Post;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(12);
        return view('post.index', compact('posts'));
    }


}
