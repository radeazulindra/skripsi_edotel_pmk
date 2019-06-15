<?php

namespace App\Http\Controllers;

use Redirect;

use App\Kamar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
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
        $title = 'Manajemen Kamar';
        $kamar = Kamar::orderBy('no_kamar', 'asc')->get();
        return view('admin.kamar.index', compact('title','kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kamar';
        return view('admin.kamar.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $no_kamar_input = $request->input('no_kamar');

        $data = $request->all();
        $count = DB::table('kamar')->where('no_kamar', $no_kamar_input)->count();

        if ($count > 0) {
            return redirect()->route('kamar.create')->with('message','Nomor kamar telah digunakan!');
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
        $title = 'Edit Kamar';
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('title','kamar'));
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
        $kamar = Kamar::findOrFail($id);
        $requestData = $request->all();
        $kamar->update($requestData);
        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::where('id', $id)->delete();
        return Redirect::back()->with('message','Kamar berhasil dihapus!');
    }

    public function ajaxKamar(){
        $kamar = Kamar::all();
        echo json_encode($kamar);
    }
}
