@extends('layout.main')

@section('container')
<main class="container">
    <h2>Edit Katalog Mobil</h2>
    <form action="{{ route('katalog.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <select name="brand" class="form-select @error('brand') is-invalid @enderror" id="brand">
                    @foreach($brand as $databrand)
                        @if($data->brand == $databrand['DESC_BRAND'])
                            <option data-id="{{ $databrand['CD_BRAND'] }}" value="{{ $databrand['DESC_BRAND'] }}" selected>{{ $databrand['DESC_BRAND'] }}</option>
                        @else
                            <option data-id="{{ $databrand['CD_BRAND'] }}" value="{{ $databrand['DESC_BRAND'] }}">{{ $databrand['DESC_BRAND'] }}</option>
                        @endif
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
                <select name="type" class="form-select @error('type') is-invalid @enderror" id="type">
                    @foreach($type as $datatype)
                        @if($data->brand == $datatype)
                            <option value="{{ $databrand['DESC_TYPE'] }}" selected>{{ $databrand['DESC_TYPE'] }}</option>
                        @else
                            <option value="{{ $databrand['DESC_TYPE'] }}">{{ $databrand['DESC_TYPE'] }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                <input name="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror" value="{{ $data->tahun }}">
                @error('tahun')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" value="{{ $data->harga }}">
                @error('harga')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" rows="5">{{ $data->spesifikasi }}</textarea>
                @error('spesifikasi')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control" type="file" id="formFile">
            </div> --}}
            <div class="position-relative">
                <a href="/katalog" class="btn btn-secondary position-absolute top-0 start-0"><i class="bi bi-arrow-left-circle"></i> kembali</a>
                <button type="submit" class="btn btn-success position-absolute top-0 end-0"><i class="bi bi-check-circle"></i> simpan</button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage();">
                <input type="hidden" class="form-control d-block" name="oldImage" value="{{ $data->image }}">
                @error('image')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3 ">
                @if ($data->image)
                    <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid">
                @else
                    <img id="image-preview" class="img-fluid">
                @endif
            </div>
        </div>
        
    </div>
    </form>
</main>
@endsection