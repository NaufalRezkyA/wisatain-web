@extends('layouts.home')

@section('container')

<section style="padding-top: 7rem;">
    <div class="bg-holder">
    </div>

    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
  <!-- alert login berhasil -->
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            @endif

<!-- alert login gagal -->
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            @endif

  <!-- alert delete berhasil -->
          @if(session()->has('delete_s'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('delete_s') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            @endif
            
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                <form action="/login" method="post">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" >
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" >
                    <label for="password">Password</label>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-info btn-login text-uppercase fw-bold" type="submit" >Sign
                      in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection
