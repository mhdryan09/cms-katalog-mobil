@extends('layout.main')

@section('container')
<main class="container">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Brand</th>
            <th scope="col">Type</th>
            <th scope="col">Tahun</th>
            <th scope="col">Harga</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection