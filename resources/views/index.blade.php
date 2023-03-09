@extends('layout.main')

@section('container')
<main class="container">

    <div class="row">
        <div class="col-lg-8">
            <a href="/katalog/create" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> tambah mobil </a>
        </div>
        <div class="col-lg-2">
            <select name="brand" id="" class="form-select d-inline w-20">
                <option>-- search by brand --</option>
                @foreach ($search as $sbrand)
                <option>{{ $sbrand->brand }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <select name="brand" id="" class="form-select d-inline w-20">
                <option>-- search by type --</option>
                @foreach ($search as $stype)
                <option>{{ $stype->type }}</option>
                @endforeach
            </select>
        </div>
    </div>
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
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->brand }}</td>
                <td>{{ $data->type }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ "Rp " . number_format($data->harga,2,',','.') }}</td>
                <td style="width: 12%;">
                    <a href="/katalog/{{ $data->id }}" class="btn btn-primary"><i class="bi bi-info-circle"></i></a>
                    <a href="/katalog/{{ $data->id }}/edit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <form action="/katalog/{{ $data->id }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="bi bi-x-circle"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
<script type="text/javascript">
</script>
@endsection