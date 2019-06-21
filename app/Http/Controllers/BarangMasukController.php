<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangMasuk;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
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
        $title='Pencatatan Barang Masuk';
        $bMasuk = BarangMasuk::orderBy('tanggal_masuk','desc')->get();
        return view('storekeeper.barangmasuk.index', compact('title','bMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Tambah Catatan Barang Masuk';
        return view('storekeeper.barangmasuk.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar_nota' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $namaBarang = $request->input('nama_barang');

        $file = $request->file('gambar_nota');
        $fileName = time().'_'.$namaBarang.'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/storage');
        $file->move($destinationPath, $fileName);

        $barang = Barang::where('nama_barang', $namaBarang)->first();

        $data = array(
            'id_barang' => $barang->id,
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'jumlah' => $request->input('jumlah'),
            'gambar_nota' => $fileName
        );

        if (BarangMasuk::create($data)) {
            $barang->jumlah += $request->input('jumlah');
            $barang->save();

            return redirect()->route('barangmasuk.index')->with('message','Berhasil menambahkan catatan barang masuk!');
        } else {
            return redirect()->route('barangmasuk.create')->with('message','Gagal menambahkan catatan barang masuk!');
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
        $title='Edit Catatan Barang Masuk';
        $bMasuk = BarangMasuk::findOrFail($id);
        return view('storekeeper.barangmasuk.edit', compact('title','bMasuk'));
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
        $bMasuk = BarangMasuk::where('id', $id)->first();

        $barang->jumlah -= $bMasuk->jumlah; // mengembalikan jumlah menjadi sebelum memasukkan barang

        if ($request->file('gambar_nota')) {
            $file = $request->file('gambar_nota');
            $fileName = time().'_'.$namaBarang.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/storage');
            $file->move($destinationPath, $fileName);

            $bMasuk->gambar_nota = $fileName;
        }

        $data = array(
            'id_barang' => $barang->id,
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'jumlah' => $request->input('jumlah'),
        );

        if ($bMasuk->update($data)) {
            $bMasuk->save(); // mengupdate file gambar nota

            $barang->jumlah += $request->input('jumlah');
            $barang->save(); // mengupdate jumlah setelah memasukkan barang

            return redirect()->route('barangmasuk.index')->with('message','Berhasil memperbarui catatan barang masuk!');
        } else {
            return redirect()->route('barangmasuk.edit', ['id' => $id])->with('message','Gagal memperbarui catatan barang masuk!');
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
        $bMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::findOrFail($bMasuk->id_barang);

        $barang->jumlah -= $bMasuk->jumlah; // mengembalikan jumlah menjadi sebelum memasukkan barang
        
        if ($barangMasuk = BarangMasuk::where('id', $id)->delete()) {
            $barang->save(); // mengupdate jumlah setelah menghapus barang
            return redirect()->route('barangmasuk.index')->with('message','Berhasil menghapus catatan barang masuk!');
        }
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
