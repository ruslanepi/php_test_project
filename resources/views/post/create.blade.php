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
                   </div>
                   <div class="mb-3">
                       <label for="content" class="form-label">Content </label>
                       <textarea name="content" type="text" class="form-control" id="content" placeholder="content"></textarea>
                   </div>
                   <div class="mb-3">
                       <label for="Image" class="form-label">Image </label>
                       <input name="image" type="text" class="form-control" id="image" placeholder="image">
                   </div>
                   <button type="submit" class="btn btn-primary">create</button>
               </form>
           </div>
       </div>
   </div>
</section>
@endsection
