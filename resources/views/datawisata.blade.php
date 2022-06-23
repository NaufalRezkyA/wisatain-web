@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">DATA WISATA</h1>
    <div class="container mb-2">
        <a href="/admin-tambahwisata" type="button" class="btn btn-success">Tambah
            +</a>
            <div class="row g-3 align-items-center mt-1">
                <div class="col-auto">
                <form action="/admin-wisata" method="GET">
                  <input type="search" name='search' class="form-control" aria-describedby="passwordHelpInline">
                </form>
                </div>
              </div>
        <div class="row">
             @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>
                            <!-- <img src="{{ asset('fotowisata/'. $row->foto) }}"
                                alt="" style="width: 8em;"> -->
                                <img src="{{  $row->foto }}"
                                alt="" style="width: 8em;">
                        </td>
                        <td>{{ $row->deskripsi }}</td>
                        <td>{{ $row->lokasi }}</td>
                        <td>{{ $row->harga }}</td>
                        <td>{{ $row->rating }}</td>
                        {{-- <td>{{ $row->updated_at->format('D M Y') }}</td> --}}
                        <td>{{ $row->updated_at->diffForHumans() }}</td>
                        <td>
                        <form action="/deletewisata/{{ $row->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger mb-1 delete">Delete</button>   
                            </form>
                            <!-- <a href="/deletewisata/{{ $row->id }}"
                                class="btn btn-danger mb-1 delete">Delete</a> -->
                                {{-- isi class kalau mau ada sweetalert : data-nama="{{ $row->nama }}" data-id={{  $row->id }} --}}
                            <a href="/showwisata/{{$row->id }}"
                                class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</section>

@endsection
