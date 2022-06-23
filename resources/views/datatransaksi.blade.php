@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">DATA TRANSAKSI</h1>
    <div class="container mb-2">
        <div class="row g-3 align-items-center mt-1">
            <div class="col-auto">
            <form action="/admin-datatransaksi" method="GET">
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
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Email Customer</th>
                        <th scope="col">Nama Wisata</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Total Prices</th>
                        <th scope="col">Bukti Transfer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>1</td>
                        <td>TRA-1</td>
                        <td>ganteng@aku.com</td>
                        <td>Garuda Wisnu Kencana</td>
                        <td>02-12-22</td>
                        <td>03-12-22</td>
                        <td>Paid</td>
                        <td>Rp150.000,00</td>
                        <td></td>
                        <td>
                            <a href="#"
                                class="btn btn-primary">Edit</a>
                        </td>
                    </tr> --}}

                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>TR-{{ $row->id }}</td>
                        <td>{{ $row->email_customer }}</td>
                        <td>{{ $row->nama_wisata }}</td>
                        <td>{{ $row->updated_at->diffForHumans() }}</td>
                        <td>{{ $row->payment_date }}</td>
                        <td>{{ $row->payment_status }}</td>
                        <td>{{ $row->total_price }}</td>
                        <td>{{ $row->foto }}</td>
                        <td></td>
                        <td>
                            <a href="#"
                                class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection