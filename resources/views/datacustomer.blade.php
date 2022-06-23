@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">DATA CUSTOMER</h1>
    <div class="container mb-2">
        <a href="/admin-tambahcustomer" type="button" class="btn btn-success">Tambah
            +</a>
            <div class="row g-3 align-items-center mt-1">
                <div class="col-auto">
                <form action="/admin-customer" method="GET">
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
                        <th scope="col">Nama Panjang</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Password</th>
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
                        <td>{{ $row->full_name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td></td>
                        {{-- <td>{{ $row->updated_at->format('D M Y') }}</td> --}}
                        <td>{{ $row->updated_at->diffForHumans() }}</td>
                        <td>
                            <form action="/deletecustomer/{{ $row->id }}" method="post">
                            <!-- <a href="/deletecustomer/{{ $row->id }}"
                                class="btn btn-danger mb-1 delete">Delete</a> -->
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger mb-1 delete">Delete</button>   
                            </form>
                            <a href="/showcustomer/{{$row->id }}"
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
