@extends('layout/main')

@section('title', 'Form Tambah Data')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mt-3">Form Tambah Data</h1>

                <form action="/katalog_mobil" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="brand">Brand</label>
                        {{-- <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            placeholder="Masukkan Brand" name="brand" value="{{ old('brand') }} "> --}}
                        <select name="brand" id="brand"
                            class="form-select
                            @error('brand') is-invalid @enderror">
                            <option></option>
                            @foreach ($brand as $databrand)
                                <option data-id="{{ $databrand['CD_BRAND'] }}" value="{{ $databrand['DESC_BRAND'] }}">
                                    {{ $databrand['DESC_BRAND'] }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type">Type</label>
                        {{-- <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                            placeholder="Masukkan Type" name="type" value="{{ old('type') }} "> --}}
                        <select name="type" id="type"
                            class="form-select
                            @error('type') is-invalid @enderror">
                        </select>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="tahun"
                            placeholder="Masukkan tahun" name="tahun" value="{{ old('tahun') }} ">
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="harga">harga</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="harga"
                            placeholder="Masukkan harga" name="harga" value="{{ old('harga') }} ">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-lg-between">
                        <a href="/katalog_mobil" class="btn btn-secondary mt-2">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @endsection --}}

    <script>
        $('#brand').change(function() {
            var brand = $(this).find(':selected').attr('data-id')
            $.ajax({
                url: "http://localhost:8000/hit",
                data: {
                    "CD_BRAND": brand,
                    "_token": '{{ csrf_token() }}'
                },
                type: "post",
                success: function(data) {
                    // $('').append(data);
                    // console.log(data);   
                    var listType = "<option> -- Pilih Tipe -- </option>"
                    var type = data;
                    // console.log(typeof type);
                    type.map(e => {
                        listType += "<option value='" + e.DESC_TYPE + "'>" + e.DESC_TYPE +
                            "</option>"
                    })
                    $('#type').html(listType);
                }
            });
        });
    </script>

@endsection
