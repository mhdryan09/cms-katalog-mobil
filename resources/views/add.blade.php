@extends('layout.main')

@section('container')
<main class="container">
    <h2>Tambah Katalog Mobil</h2>
    <form action="/katalog" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <select name="brand" class="form-select @error('brand') is-invalid @enderror" id="brand">
                    <option></option>
                    @foreach ($brand as $databrand)
                        <option data-id="{{ $databrand['CD_BRAND'] }}" value="{{ $databrand['DESC_BRAND'] }}">{{ $databrand['DESC_BRAND'] }}</option>
                    @endforeach
                </select>
                @error('brand')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Type</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" id="type"></select>
                @error('type')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                <input name="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror">
                @error('tahun')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror">
                @error('harga')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" rows="5"></textarea>
                @error('spesifikasi')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage();">
                @error('image')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3 ">{{-- text-center --}}
                <img id="image-preview" class="img-fluid">
            </div>
        </div>
        <div class="position-relative">
            <a href="/katalog" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> kembali</a>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> simpan</button>
        </div>
    </div>    
    </form>
    
</main>
    

@endsection