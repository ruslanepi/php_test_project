@extends('layout.main')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row gy-3 gx-3">
            @foreach($posts as $post)
                <div class="col-3 ">
                   <div class="card">
                       <div class="card-body">
                           <h5 class="card-title">{{$post->id}}. {{$post->title}}</h5>
                           <p class="card-text">{{$post->content}}</p>
                           <div class="icon"><i class="bi bi-heart me-1"></i><span>{{$post->likes}}</span></div>
                       </div>
                   </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
