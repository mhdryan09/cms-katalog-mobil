@extends('layout/main')

@section('title', 'Detail Katalog Mobil')

@section('container')
    <div class="container">
        <div class="row">
            <h1 class="mt-3">Detail Katalog Mobil</h1>

            <div class="col-lg-6">
                <ul class="list-group mt-3">
                    <li class="list-group-item fs-4">Brand : {{ $data->brand }}</li>
                    <li class="list-group-item fs-4">Type : {{ $data->type }}</li>
                    <li class="list-group-item fs-4">Tahun : {{ $data->tahun }}</li>
                    <li class="list-group-item fs-4">Harga : Rp. {{ $hargabaru }}</li>
                </ul>
                <a href="/katalog_mobil" class="btn btn-secondary mt-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection
