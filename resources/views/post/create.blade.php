@extends('layout.main')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form action="{{ route('post.store') }} " method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title </label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="title">
                            @error('title')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content </label>
                            <textarea name="content" type="text" class="form-control" id="content"
                                      placeholder="content"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image </label>
                            <input name="image" type="text" class="form-control" id="image" placeholder="image">
                        </div>
                        <div class="form-group">
                            <label for="category">Choose category</label>
                            <select id="category" class=" form-select mb-3" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Choose tags</label>
                            <select multiple id="tags" class=" form-select mb-3" name="tags[]">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
