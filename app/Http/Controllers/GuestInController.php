<?php

namespace App\Http\Controllers;

use PDF;
use Redirect;

use App\TamuHotel;
use App\TagihanTamu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Guest List';
        $tamuCheckIn = TamuHotel::where('status','Check-In')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();
        $tamuCheckOut = TamuHotel::where('status','Check-Out')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();
        return view('resepsionis.guestin.index', compact('title','tamuCheckIn','tamuCheckOut'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title='Detail Tamu';
        $tamu = TamuHotel::findOrFail($id);
        return view('resepsionis.guestin.show',compact('title','tamu'));
    }

    public function storeTagihan(Request $request)
    {
        $id_tamu = $request->input('id_tamu');
        $id_kamar = $request->input('id_kamar');
        $nama_tagihan = $request->input('jenis_tagihan')." ".$request->input('nama_tagihan');
        $besaran = $request->input('jenis_tagihan').$request->input('besaran');

        $tagihan = new TagihanTamu;
        $tagihan->id_tamu = $id_tamu;
        $tagihan->id_kamar = $id_kamar;
        $tagihan->nama_tagihan = $nama_tagihan;
        $tagihan->besaran = $besaran;
        $tagihan->save();

        return redirect()->back()->with('message', 'Tagihan telah ditambahkan!');
    }

    public function destroyTagihan($id)
    {
        DB::table('tagihan_tamu')->where('id', $id)->delete();
        return Redirect::back()->with('message','Tagihan berhasil dihapus!');
    }

    public function checkOut($id,$tagihan){
        TamuHotel::where('id', $id)->update(array('status' => 'Check-Out','total_tagihan' => $tagihan));
        return Redirect::back()->with('message','Berhasil check-out!');
    }

    public function printBill($id){
	    $tamu = TamuHotel::findOrFail($id);
 
	    $pdf = PDF::loadview('resepsionis.guestin.bill',['tamu'=>$tamu]);
        return $pdf->stream();
    }

    public function ajaxTamuHotel(){
        $tamu = DB::table('tagihan_tamu')
            ->select('tamu_hotel.id as id_tamu','kamar.id as id_kamar',
            'tagihan_tamu.id as id_tagihan_tamu',
            'tamu_hotel.tanggal_checkin as tanggal_checkin',
            'tamu_hotel.tanggal_checkout as tanggal_checkout',
            'tamu_hotel.status as status_tamu_hotel',)
            ->rightJoin('kamar', 'kamar.id', '=', 'tagihan_tamu.id_kamar')
            ->leftJoin('tamu_hotel', 'tamu_hotel.id', '=', 'tagihan_tamu.id_tamu')
            ->where('tagihan_tamu.nama_tagihan', 'like', 'Kamar%')
            ->whereNotIn('tamu_hotel.status',["Check-Out"])
            ->orderBy('tamu_hotel.id', 'asc')
            ->get();
        echo json_encode($tamu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id_tamu = $request->input('id_tamu');
        // $id_kamar = $request->input('id_kamar');
        // $nama_tagihan = $request->input('jenis_tagihan')." ".$request->input('nama_tagihan');
        // $besaran = $request->input('jenis_tagihan').$request->input('besaran');

        // $tagihan = new TagihanTamu;
        // $tagihan->id_tamu = $id_tamu;
        // $tagihan->id_kamar = $id_kamar;
        // $tagihan->nama_tagihan = $nama_tagihan;
        // $tagihan->besaran = $besaran;
        // $tagihan->save();

        // return redirect()->back()->with('alert', 'Tagihan telah ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

}
