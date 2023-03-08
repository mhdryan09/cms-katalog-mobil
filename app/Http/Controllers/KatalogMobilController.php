<?php

namespace App\Http\Controllers;

use App\Models\KatalogMobil;
use Illuminate\Http\Request;

class KatalogMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KatalogMobil::all();

        return view('katalog_mobil/index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('katalog_mobil/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // sebelum kita masukan ke dalam database, kita cek dulu requestnya
        $request->validate(
            [
                'brand' => 'required',
                'type' => 'required',
                'tahun' => 'required',
                'harga' => 'required'
            ],
            [
                'brand.required' => 'brand harus diisi! tidak boleh kosong',
                'type.required' => 'type harus diisi! tidak boleh kosong',
                'tahun.required' => 'tahun harus diisi! tidak boleh kosong',
                'harga.required' => 'harga harus diisi! tidak boleh kosong'
            ]
        );

        KatalogMobil::create($request->all());

        return redirect('/katalog_mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KatalogMobil::findOrFail($id);
        $harga1 = number_format($data->harga, 2, ',', '.');
        // $hargaBaru = ;
        return view(
            'katalog_mobil.show',
            [
                'data' => $data,
                'hargabaru' => $harga1
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KatalogMobil::findOrFail($id);

        return view(
            'katalog_mobil.edit',
            [
                'data' => $data,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate(
            [
                'brand' => 'required',
                'type' => 'required',
                'tahun' => 'required',
                'harga' => 'required'
            ],
            [
                'brand.required' => 'brand harus diisi! tidak boleh kosong',
                'type.required' => 'type harus diisi! tidak boleh kosong',
                'tahun.required' => 'tahun harus diisi! tidak boleh kosong',
                'harga.required' => 'harga harus diisi! tidak boleh kosong'
            ]
        );

        KatalogMobil::where('id', $id)
            ->update($validasi);

        return redirect('/katalog_mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KatalogMobil::destroy($id);
        return redirect('/katalog_mobil');
    }
}
