<?php

namespace App\Http\Controllers;

use App\Models\KatalogMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KatalogMobilController extends Controller
{   

    public function __construct(){
        $brand = Http::withHeaders(['APIKey' => 'Rz5yS2oiT45Kio1WYOLO'])->post('https://apidev.acc.co.id/restv2/accone/acctrade/getlistmasterunitbrand')->json();
        $this->brand = $brand['OUT_DATA'];

        $type = Http::withHeaders(['APIKey' => 'Rz5yS2oiT45Kio1WYOLO'])->post('https://apidev.acc.co.id/restv2/accone/acctrade/getlistmasterunittype')->json();
        $this->type = $type['OUT_DATA'];
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KatalogMobil::all();

        return view('index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        // dd($this->type);

        return view('add',[
            'brand' => $this->brand,
            'type' => $this->type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'tahun' => 'required|max:4',
            'harga' => 'required',
            'spesifikasi' => 'required|min:10'
        ]);

        KatalogMobil::create($validasiData);

        return redirect('/katalog');
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
        
        return view('show',[
            'data' => $data
        ]);
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
        
        return view('edit',[
            'data' => $data,
            'brand'=> $this->brand,
            'type'=> $this->type
        ]);
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
        $validasiData = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'tahun' => 'required|max:4',
            'harga' => 'required',
            'spesifikasi' => 'required|min:10'
        ]);

        KatalogMobil::where('id', $id)->update($validasiData);

        return redirect('/katalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KatalogMobil::where('id', $id)->delete();

        return redirect('/katalog');
    }
}
