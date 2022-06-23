@extends('layouts.main')

@section('container')

<section>
<h1 class="text-center">TAMBAH DATA WISATA</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertwisata" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Nama Wisata</label>
                                <input type="text" name="nama" class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Rating</label>
                                <select class="form-select" name="rating"
                                    aria-label="Default select example">
                                    <option selected>Rating 1-5
                                    </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">Masukan Foto</label>
                                <!-- <input type="file" name="foto" class="form-control"> -->
                                <input type="text" name = "foto" class="form-control">
                            </div>
                            <button type="submit"
                                class="btn btn-primary">Submit</button>
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
