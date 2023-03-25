@extends('layout.main')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="mb-4"><a class="btn btn-primary" href="{{route('post.create')}}">Создать новую запись </a></div>
        <div class="row gy-3 gx-3">
            @foreach($posts as $post)
                <div class="col-3 ">
                   <div class="card">
                       <div class="card-body">
                           <h5 class="card-title">{{$post->id}}. {{$post->title}}</h5>
{{--                           {{$post->category->title}}--}}
                           <p class="card-text">{{$post->content}}</p>
                           <div class="icon"><i class="bi bi-heart me-1"></i><span>{{$post->likes}}</span></div>
                           <a href="{{route('post.show', $post->id)}}">Подробнее</a>
                       </div>
                   </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
