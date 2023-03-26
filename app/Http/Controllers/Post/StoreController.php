<?php

namespace App\Http\Controllers\Post;



use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);

        //используем attach метод, т.к создать новую связь post <-> tag
        $post->tags()->attach($tags);

        //слишком "много кода", но из плюсов - создает поля "createdAt" и "updatedAt" в отличие от attach
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//        }
        return redirect()->route('post.index');
    }


}
