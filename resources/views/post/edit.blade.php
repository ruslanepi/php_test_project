@extends('layout.main')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-2"><a class="btn btn-primary" href="{{route('post.show', $post->id)}}">Назад</a></div>
            <div class="row">
                <div class="col-4">
                    <form action="{{ route('post.update', $post->id) }} " method="post">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title </label>
                            <input name="title" type="text" class="form-control" id="title"
                                   placeholder="{{$post->title}}" value="{{$post->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content </label>
                            <textarea name="content" type="text" class="form-control" id="content"
                                      placeholder="{{$post->content}}">{{$post->content}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image </label>
                            <input name="image" type="text" class="form-control" id="{{$post->image}}"
                                   placeholder="image" value="{{$post->image}}">
                        </div>
                        <div class="form-group">
                            <label for="category">Choose category</label>
                            <select id="category" class=" form-select mb-3" name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        {{ $category->id == $post->category->id ? ' selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Choose tags</label>
                            <select multiple id="tags" class=" form-select mb-3" name="tags[]">
                                @foreach($tags as $tag)
                                    <option
                                        @foreach($post->tags as $postTag)
                                            {{ $tag->id == $postTag->id ? ' selected' : ''}}
                                        @endforeach
                                         value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
