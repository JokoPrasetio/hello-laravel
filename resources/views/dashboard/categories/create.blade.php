@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Selamat Bekerja {{ auth()->user()->name }}</h2>
</div>

<div class="col-lg-8">
    <form action="/dashboard/categories" method="post" class="mb-3">
    @csrf 
    <div class="mb3">
        <label for="name" class="form-label @error('name')is-invalid @enderror">Nama Kategori</label>
        <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}">
        @error('name')
        <div class="invlid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug')is-invlid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
    @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>

<script>
    const name =document.querySelector('#name');
    const slug =document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
    
@endsection