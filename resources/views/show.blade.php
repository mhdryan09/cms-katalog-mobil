@extends('layout.main')

@section('container')
<main class="container">
    <h2>Detail Mobil {{ $data->brand }} type {{ $data->type }}</h2>
    <div class="row">
        
        <div class="mb-3">
            <div class="position-relative ">
                <a href="/katalog" class="btn btn-secondary position-relative top-0 start-0"><i class="bi bi-arrow-left-circle"></i> kembali</a>
                <a href="/katalog/{{ $data->id }}/edit" class="btn btn-primary position-relative top-0 end-0"><i class="bi bi-pencil-square"></i> edit</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <input name="brand" type="text" class="form-control" value="{{ $data->brand }}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Type</label>
                <input name="type" type="text" class="form-control" value="{{ $data->type }}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                <input name="tahun" type="number" class="form-control" value="{{ $data->tahun }}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input name="harga" type="number" class="form-control" value="{{ $data->harga }}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control" rows="5" readonly>{{ $data->spesifikasi }}</textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3 text-center">
                <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid">
            </div>
        </div>
    </div>
    
</main>
@endsection