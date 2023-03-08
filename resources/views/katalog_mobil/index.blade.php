@extends('layout/main')

@section('title', 'Katalog Mobil')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mt-2">Daftar Katalog Mobil</h1>

                <a href="/katalog_mobil/create" class="btn btn-primary mt-4">Tambah Data</a>

                <table class="table mt-3">
                    <thead class="table-dark text-center">
                        <th scope="col">No</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Type</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $d->brand }}</td>
                                <td>{{ $d->type }}</td>
                                <td>{{ $d->tahun }}</td>
                                <td>{{ $d->harga }}</td>
                                <td>
                                    <a href="/katalog_mobil/{{ $d->id }}"
                                        class="badge rounded-pill text-bg-primary p-2"
                                        style="text-decoration: none">Detail</a>
                                    <a href="/katalog_mobil/{{ $d->id }}/edit"
                                        class="badge rounded-pill text-bg-success p-2"
                                        style="text-decoration: none">Edit</a>
                                    <form action="/katalog_mobil/{{ $d->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge rounded-pill text-bg-danger p-2"
                                            style="text-decoration: none">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
