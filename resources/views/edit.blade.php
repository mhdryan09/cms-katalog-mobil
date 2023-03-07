@extends('layout.main')

@section('container')
<main class="container">
    <h2>Edit Katalog Mobil</h2>
    <div class="col-md-5">
        <form action="{{ route('katalog.update', $data->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <select name="brand" class="form-select @error('brand') is-invalid @enderror">
                    @foreach($brand as $br)
                        @if($data->brand == $br)
                            <option selected>{{ $br }}</option>
                        @else
                            <option>{{ $br }}</option>
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
                <select name="type" class="form-select @error('type') is-invalid @enderror">
                    @foreach($type as $tp)
                        @if($data->type == $tp)
                            <option selected>{{ $tp }}</option>
                        @else
                            <option>{{ $tp }}</option>
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
        </form>
    </div>
    
</main>
@endsection