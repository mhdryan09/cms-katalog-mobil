@extends('layout/main')

@section('title', 'Form Ubah Data')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mt-3">Form Ubah Data</h1>

                <form action="/katalog_mobil/{{ $data->id }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            placeholder="Masukkan Brand" name="brand" value="{{ $data->brand }}">
                        @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                            placeholder="Masukkan Type" name="type" value="{{ $data->type }}">
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                            placeholder="Masukkan tahun" name="tahun" value="{{ $data->tahun }}">
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="harga">harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            placeholder="Masukkan harga" name="harga" value="{{ $data->harga }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-lg-between">
                        <a href="/katalog_mobil" class="btn btn-secondary mt-2">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
