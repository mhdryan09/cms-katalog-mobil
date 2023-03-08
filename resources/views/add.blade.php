@extends('layout.main')

@section('container')
<main class="container">
    <h2>Tambah Katalog Mobil</h2>
    <div class="col-md-5">
        <form action="/katalog" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <select name="brand" class="form-select @error('brand') is-invalid @enderror" id="brand">
                    <option></option>
                    @foreach ($brand as $databrand)
                        <option value="{{ $databrand['CD_BRAND'] }}">{{ $databrand['DESC_BRAND'] }}</option>
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
                <input name="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror" >
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
            {{-- <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control" type="file" id="formFile">
            </div> --}}
            <div class="position-relative">
                <a href="/katalog" class="btn btn-secondary position-absolute top-0 start-0"><i class="bi bi-arrow-left-circle"></i> kembali</a>
                <button class="btn btn-success position-absolute top-0 end-0"><i class="bi bi-check-circle"></i> simpan</button>
            </div>
        </form>
    </div>
    
</main>
    <script>
        $('#brand').change(function(){
            var brand = $(this).find(':selected').val()

            $.ajax({
                url: "http://localhost:8000/hit",
                data: { "CD_BRAND": brand, "_token" : '{{ csrf_token() }}'},    
                type: "post",
                success: function(data){
                // $('').append(data);
                // console.log(data);   
                var listType = "<option> -- Pilih Tipe -- </option>"
                var type = data;
                // console.log(typeof type);
                type.map(e => {
                    listType += "<option value='"+e.DESC_TYPE +"'>"+ e.DESC_TYPE+"</option>"
                })
                $('#type').html(listType);
                }
            });
        });

    </script>
@endsection