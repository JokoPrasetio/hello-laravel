@extends('dashboard.layouts.main')
@section('container')
    <div class="flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 boder-bottom">
        <h2>Haiii, Semangat {{ auth()->user()->name }}</h2>    
    </div>  
        
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive col-lg-8">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title/Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info text-decoration-none ms-1">Lihat</</a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-decoration-none ms-1">Edit</a>
                       <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('kamu yakin')">Hapus</button>
                    </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection