@extends('dashboard.layouts.main')
@section('container')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <!-- Post header-->
                <header class="mb-4">
                  <!-- Post title-->
                  <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                  <!-- Post meta content-->
                  <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->diffForHumans() }} by Start {{ $post->author->name }}</div>
                  <!-- Post categories-->
                  <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $post->category->name }}</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4">
                  @if ($post->image)
                      <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" width="700" height="400" class="img-fluid mt-3">
                      </div>
                  @else
                  <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d" height="400" width="700"  alt="{{ $post->title }}">
                  @endif
                </figure>
                <!-- Post content-->
                <article>
                <section class="mb-5">
                  <h2 class="fw-bolder mb-4 mt-5">{{ $post->title }}</h2>
                  <p class="fs-5 mb-4">{!! $post->body !!}
                  </p>
                </section>
              </article>
        </div>
    </div>
</div>
@endsection