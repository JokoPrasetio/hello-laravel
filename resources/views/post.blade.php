@extends('layouts.main')

@section('container')

    {{-- <h1>{{ $post->title }}</h1>
    <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d" height="400" width="700" alt="">
    <p>{!! $post->body !!}</p> --}}
     
    <div class="container mt-5">
        <div class="row">
          <div class="col-lg-8">
            <!-- Post content-->
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
                @if($post->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" width="700" height="400" class="img-fluid mt-3">
                </div>
                @else
                <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d" height="400" width="700"  alt="..." />
                @endif
              </figure>
              <!-- Post content-->
              <section class="mb-5">
               
                <h2 class="fw-bolder mb-4 mt-5">{{ $post->title }}</h2>
                <p class="fs-5 mb-4">{!! $post->body !!}
                </p>
              </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
              <div class="card bg-light">
                <div class="card-body">
                  <!-- Comment form-->
                  <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                  <!-- Comment with nested comments-->
                  <div class="d-flex mb-4">
                    <!-- Parent comment-->
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                      <div class="fw-bold">Commenter Name</div>
                      If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                      <!-- Child comment 1-->
                      <div class="d-flex mt-4">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                          <div class="fw-bold">Commenter Name</div>
                          And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                        </div>
                      </div>
                      <!-- Child comment 2-->
                      <div class="d-flex mt-4">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                          <div class="fw-bold">Commenter Name</div>
                          When you put money directly to a problem, it makes a good headline.
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single comment-->
                  <div class="d-flex">
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                      <div class="fw-bold">Commenter Name</div>
                      When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- Side widgets-->
          <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
              <div class="card-header">Categories</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        @foreach ($categories as $category)                            
                        <li><a href="/categories/{{ $category->slug }}" class="text-decoration-none text-black kategory">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
              <div class="card-header">Side Widget</div>
              <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
          </div>
        </div>
      </div>

@endsection