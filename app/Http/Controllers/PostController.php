<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::where('is_published', '0')->get();
        //$posts = $posts->except([3, 4, 6]);
        //$posts = Post::where('is_published', '0')->orWhere('is_published',  '1')->get();
        //$category = Category::all();
        //$post = Post::find(3);

//        $categories = Category::all();
//        foreach ($categories as $category) {
//            dump($category->title);
//            dump($category->posts);
//        }

//        $posts = Post::all();
//        foreach ($posts as $post) {
//            dump($post->title);
//            dump($post->category);
//        }

        $tags = Tag::all();

        foreach ($tags as $tag) {
            dump($tag->title);

            foreach ($tag->posts as $postTitle) {
                dump($postTitle->title);
            }
    }

        //return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
//    public  function  show($id) {
//        $post = Post::findOrFail($id);
//        dd($post->title);
//    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


////////////////////////////////////////////////////////////////


    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'some_post',
            'content' => 'some_content',
            'image' => 'anothertestImage',
            'likes' => 500,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some_post'
        ], $anotherPost);

        dd('finished firstOrCreate');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updated4 some_post2',
            'content' => 'some_content',
            'image' => 'anothertestImage',
            'likes' => 500,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'updated3 some_post2'
        ], $anotherPost);

        dd('finished updateOrCreate');
    }
}
