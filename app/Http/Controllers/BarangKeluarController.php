<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangKeluar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pencatatan Barang Keluar';
        $bKeluar = BarangKeluar::orderBy('tanggal_keluar','desc')->get();
        return view('storekeeper.barangkeluar.index', compact('title','bKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Catatan Barang Keluar';
        return view('storekeeper.barangkeluar.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaBarang = $request->input('nama_barang');
        $barangKeluarJumlah = $request->input('jumlah');

        $barang = Barang::where('nama_barang', $namaBarang)->first();
        
        if ($barangKeluarJumlah > $barang->jumlah) {
            return redirect()->route('barangkeluar.create')->with('message','Jumlah barang yang ingin dikeluarkan lebih besar dari stok yang ada!');
        } else {
            $data = array(
                'id_barang' => $barang->id,
                'tanggal_keluar' => $request->input('tanggal_keluar'),
                'jumlah' => $request->input('jumlah'),
                'nama_pegawai' => $request->input('nama_pegawai'),
                'tujuan' => $request->input('tujuan')
            );

            $barang->jumlah -= $request->input('jumlah');
            if ($barang->save()) {
                BarangKeluar::create($data);
            }
            
            return redirect()->route('barangkeluar.index')->with('message','Berhasil menambahkan catatan barang keluar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Edit Catatan Barang Keluar';
        $bKeluar = BarangKeluar::findOrFail($id);
        return view('storekeeper.barangkeluar.edit', compact('title','bKeluar'));
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
        $namaBarang = $request->input('nama_barang');
        $barang = Barang::where('nama_barang', $namaBarang)->first();
        $bKeluar = BarangKeluar::where('id', $id)->first();
        $oldJumlah = $bKeluar->jumlah;
        $newJumlah = $request->input('jumlah');

        $barang->jumlah += $oldJumlah; // mengembalikan jumlah sebelum mengeluarkan barang

        if ($newJumlah > $barang->jumlah) {
            return redirect()->route('barangkeluar.edit', ['id' => $id])->with('message','Jumlah barang yang ingin dikeluarkan lebih besar dari stok yang ada!');
        } else {
            $barang->jumlah -= $newJumlah;
            $barang->save(); // mengupdate jumlah setelah mengeluarkan barang

            $data = array(
                'id_barang' => $barang->id,
                'tanggal_keluar' => $request->input('tanggal_keluar'),
                'jumlah' => $newJumlah,
                'nama_pegawai' => $request->input('nama_pegawai'),
                'tujuan' => $request->input('tujuan')
            );
            $bKeluar->update($data);

            return redirect()->route('barangkeluar.index')->with('message','Berhasil memperbarui catatan barang keluar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
