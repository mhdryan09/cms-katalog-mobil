@extends('layout.main')

@section('container')
<main class="container">

    <a href="/katalog/create" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> tambah mobil </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Brand</th>
            <th scope="col">Type</th>
            <th scope="col">Tahun</th>
            <th scope="col">Harga</th>
            <th scope="col">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $data )
            <tr>
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->brand }}</td>
                <td>{{ $data->type }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ $data->harga }}</td>
                <td>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection