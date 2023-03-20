@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <h2 class="text-center mt-2">Login Now</h2>

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
        
        <form action="/login" method="post">
            @csrf
             <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="Input-Your-Email" autofocus required value="{{ old('email') }}">

                     @error('email')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
             </div>
             <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Input-Your-Password" required>
            </div>

           <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>
</div>
  @endsection