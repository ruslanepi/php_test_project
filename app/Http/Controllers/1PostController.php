<?php
//
//namespace App\Http\Controllers;
//
//
//use App\Models\Category;
//use App\Models\Post;
//use App\Models\PostTag;
//use App\Models\Tag;
//use Illuminate\Http\Request;
//
//class PostController extends Controller
//{
//    public function index()
//    {
//        //$posts = Post::where('is_published', '0')->get();
//        //$posts = $posts->except([3, 4, 6]);
//        //$posts = Post::where('is_published', '0')->orWhere('is_published',  '1')->get();
//        //$category = Category::all();
//        //$post = Post::find(3);
////        $categories = Category::all();
////        foreach ($categories as $category) {
////            dump($category->title);
////            dump($category->posts);
////        }
//
////        foreach ($posts as $post) {
////            dump($post->title);
////            dump($post->category);
////        }
//
//        $posts = Post::all();
//
//
//        return view('post.index', compact('posts'));
//    }
//
//    public function create()
//    {
//        $categories = Category::all();
//        $tags = Tag::all();
//        return view('post.create', compact('categories', 'tags'));
//    }
//
//    public function store()
//    {
//        $data = request()->validate([
//            'title' => 'required|string',
//            'content' => 'string',
//            'image' => 'string',
//            'category_id' => 'int',
//            'tags' => ''
//        ]);
//
//        $tags = $data['tags'];
//        unset($data['tags']);
//        $post = Post::create($data);
//
//        //используем attach метод, т.к создать новую связь post <-> tag
//        $post->tags()->attach($tags);
//
//        //слишком "много кода", но из плюсов - создает поля "createdAt" и "updatedAt" в отличие от attach
////        foreach ($tags as $tag) {
////            PostTag::firstOrCreate([
////                'tag_id' => $tag,
////                'post_id' => $post->id,
////            ]);
////        }
//        return redirect()->route('post.index');
//    }
////    public  function  show($id) {
////        $post = Post::findOrFail($id);
////        dd($post->title);
////    }
//    public function show(Post $post)
//    {
//        return view('post.show', compact('post'));
//    }
//
//    public function edit(Post $post)
//    {
//        $tags = Tag::all();
//        $categories = Category::all();
//        return view('post.edit', compact('categories', 'post', 'tags'));
//    }
//
//    public function update(Post $post)
//    {
//        $data = request()->validate([
//            'title' => 'string',
//            'content' => 'string',
//            'image' => 'string',
//            'category_id' => 'int',
//            'tags' => ''
//        ]);
//
//        $tags = $data['tags'];
//        unset($data['tags']);
//
//        $post->update($data);
//        //метод sync чтобы обновить связи (attach не подходит, т.к он добавил бы связы к уже имеющимся)
//        $post->tags()->sync($tags);
//
//        return redirect()->route('post.show', $post->id);
//    }
//
//
//    public function destroy(Post $post)
//    {
//        $post->delete();
//        return redirect()->route('post.index');
//    }
//
//
//////////////////////////////////////////////////////////////////
//
//
//    public function restore()
//    {
//        $post = Post::withTrashed()->find(2);
//        $post->restore();
//        dd('restored');
//    }
//
//    public function firstOrCreate()
//    {
//        $anotherPost = [
//            'title' => 'some_post',
//            'content' => 'some_content',
//            'image' => 'anothertestImage',
//            'likes' => 500,
//            'is_published' => 1,
//        ];
//
//        $post = Post::firstOrCreate([
//            'title' => 'some_post'
//        ], $anotherPost);
//
//        dd('finished firstOrCreate');
//    }
//
//    public function updateOrCreate()
//    {
//        $anotherPost = [
//            'title' => 'updated4 some_post2',
//            'content' => 'some_content',
//            'image' => 'anothertestImage',
//            'likes' => 500,
//            'is_published' => 1,
//        ];
//
//        $post = Post::updateOrCreate([
//            'title' => 'updated3 some_post2'
//        ], $anotherPost);
//
//        dd('finished updateOrCreate');
//    }
//}
