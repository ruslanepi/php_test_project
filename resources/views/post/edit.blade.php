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
                            <input name="title" type="text" class="form-control" id="title" placeholder="{{$post->title}}" value="{{$post->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content </label>
                            <textarea name="content" type="text" class="form-control" id="content" placeholder="{{$post->content}}" >{{$post->content}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image </label>
                            <input name="image" type="text" class="form-control" id="{{$post->image}}" placeholder="image" value="{{$post->image}}">
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
