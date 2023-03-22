<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function index() {
        //$posts = Post::where('is_published', '0')->get();
        //$posts = $posts->except([3, 4, 6]);
        //$posts = Post::where('is_published', '0')->orWhere('is_published',  '1')->get();
        $posts = Post::all();


        return view('posts', compact('posts'));
    }
    public  function create() {
        $postsArr = [
            [
                'title' => 'title of post',
                'content' => 'content of post',
                'image' => 'testImage',
                'likes' => 50,
                'is_published' => 1,
            ],
            [
                'title' => 'another of post',
                'content' => 'another content of post',
                'image' => 'anothertestImage',
                'likes' => 150,
                'is_published' => 1,
            ],
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }

    public function update() {
        //$post1 = Post::where('id', '6')->get();
        $post1 = Post::find(6); //find ищет по primary_key
        $post1->update([
            'title' => 'updated2',
            'content' => 'updated2 another content of post',
            'image' => 'updated2 anothertestImage',
            'likes' => 150,
            'is_published' => 1,
        ]);
        dd('updated');
    }


    public  function  delete() {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public  function  restore() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public  function firstOrCreate() {
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

    public  function updateOrCreate() {
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
