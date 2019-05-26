<?php

namespace App\Http\Controllers;

use Redirect;

use App\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Barang';
        $barang = Barang::orderBy('jenis_barang', 'asc')->get();
        return view('admin.barang.index', compact('title','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Barang';
        return view('admin.barang.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_barang_input = $request->input('nama_barang');

        $data = $request->all();
        $count = DB::table('barang')->where('nama_barang', $nama_barang_input)->count();

        if ($count > 0) {
            return redirect()->route('barang.create')->with('message','Nama barang telah tersedia!');
        } else {
            Kamar::create($data);
            return redirect()->route('kamar.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Barang';
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('title','barang'));
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
        $barang = Barang::findOrFail($id);
        $requestData = $request->all();
        $barang->update($requestData);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->delete();
        return Redirect::back()->with('message','Barang berhasil dihapus!');
    }
}
