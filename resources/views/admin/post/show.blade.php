@extends('layout.admin')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="mb-2"><a class="btn btn-primary" href="{{route('admin.post.index')}}">Назад</a></div>
        <div class="mb-4"><a class="btn btn-secondary" href="{{route('admin.post.edit', $post->id)}}">Редактировать</a></div>
        <div class="row gy-3 gx-3">
                <div class="col-12 ">
                   <div class="card">
                       <div class="card-body">

                           <h5 class="card-title">{{$post->id}}. {{$post->title}}</h5>
                           <p class="card-text">{{$post->content}}</p>

                           <div class="icon"><i class="bi bi-heart me-1"></i><span>{{$post->likes}}</span></div>
                       </div>
                   </div>
                </div>
        </div>
        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger mt-4" type="submit" placeholder="Удалить пост" value="Удалить пост">
        </form>
    </div>
</section>
@endsection
