@extends('layouts.main')

@section('container')

<section>
<div class="text-center">
            <img class="rounded-circle" src="{{ asset('fotoadmin/'. Auth()->User()->foto) }}"
                                alt="" style="width: 8em;">
</div>
<br>
<h1 class="text-center">{{Auth()->User()->name}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
              <!-- alert berhasil edit -->
            @if(session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            @endif
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Email </label>
                                <br>
                                <label>{{ Auth()->User()->email }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Phone</label>
                                <br>
                                <label>{{ Auth()->User()->phone }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Motto Hidup</label>
                                <br>
                                <label>{{ Auth()->User()->motto }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Usia</label>
                                    <br>
                                <label>{{ Auth()->User()->usia }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Status</label>
                                <br>
                                <label>{{ Auth()->User()->status }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Jenis Kelamin</label>
                                <br>
                                <label>{{ Auth()->User()->JK }}</label>
                            </div>
                            <a href="/editAdmin" type="button" class="btn btn-success">Edit
                             Info</a>
                        </form>
                        <br>
                        <form action="/deleteAdmin" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Yakin mau hapus akun?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

@endsection
