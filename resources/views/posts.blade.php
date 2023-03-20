@extends('layouts/main')

@section('container')   

  <h2>{{ $title }}</h2>
    <main id="main">
        <section class="single-post-content">
          <div class="container">
            <div class="row">
                @foreach($posts as $post)
              <div class="col-md-9 post-content" data-aos="fade-up">
                <!-- =======Post Content ======= -->
                <div class="single-post mt-4">
                  <div class=" post-meta">kategori: <a class="date badge bg-secondary text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> <span class="mx-1">&bullet;</span> <span class="fw-bold">{{ $post->created_at->diffForHumans() }}</span></div>
                  <h1 class="mb-5" href="">{{ $post->title }}</h1>
                  <figure class="my-4">
                    @if ($post->image)
                    <div style="max-height:350px; overflow:hidden">
                      <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" width="700" height="400" class="img-fluid">
                    </div>
                    @else
                    <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d" width="1500" style="height:300px" alt="{{ $post->author->username }}" class="img-fluid" />
                    @endif
                  
                    <figcaption>{{ $post->slug }}</figcaption>
                  </figure>
                  <p>{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}">Readmore...</a>
                </div>
                <!-- End Post Content -->
              </div>
                @endforeach
            </div>
          </div>
        </section>
      </main>

  


@endsection