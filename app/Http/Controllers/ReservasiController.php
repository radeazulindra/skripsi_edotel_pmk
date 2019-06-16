<?php

namespace App\Http\Controllers;

use DateTime;

use App\Kamar;
use App\Reservasi;
use App\ReservasiKamar;
use App\TamuHotel;
use App\TagihanTamu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
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
        $title = 'Reservasi';
        $sudahKonfirmasi = Reservasi::where('status','Sudah Konfirmasi')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();
        $belumKonfirmasi = Reservasi::where('status','Belum Konfirmasi')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();
        $sudahCheckIn = Reservasi::where('status','Sudah Check-In')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();
        $batalReservasi = Reservasi::where('status','Batal Reservasi')->orderBy('tanggal_checkin', 'asc')->orderBy('tanggal_checkout', 'asc')->get();

        return view('resepsionis.reservasi.index', compact('title','sudahKonfirmasi','belumKonfirmasi','sudahCheckIn','batalReservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Form Reservasi';
        return view('resepsionis.reservasi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rooms = $request->input('room');

        $reservasi = new Reservasi;
        $reservasi->nama = $request->input('nama');
        $reservasi->no_telp = $request->input('no_telp');
        $reservasi->tanggal_checkin = $request->input('tgl_checkin');
        $reservasi->tanggal_checkout = $request->input('tgl_checkout');
        $reservasi->catatan = $request->input('catatan');
        $reservasi->status = $request->input('status');
        if (isset($rooms)) {
            $reservasi->save();
            $reservasi_id = $reservasi->id;
            foreach($rooms as $room) {
                $reservasiKamar = new ReservasiKamar;
                $reservasiKamar->id_reservasi = $reservasi_id;
                $reservasiKamar->id_kamar = $room;
                $reservasiKamar->save();
            }
        } else {
            return redirect()->back()->with('alert', 'Belum memilih kamar!');
        }
        return redirect()->route('reservasi.index');
    }

    public function updateStatus($id, $newstatus){
        Reservasi::where('id', $id)->update(array('status' => $newstatus));
        return redirect()->route('reservasi.index');
    }

    // public function updateStatusReservationToCheckIn($id, $newstatus){
    //     Reservasi::where('id', $id)->update(array('status' => $newstatus));
    // }

    public function createCheckIn($id=NULL){
        $reservasi = Reservasi::find($id);
        $walkInRegist = true;
        if ($id!=NULL) {
            $walkInRegist = false;
        }
        $title = 'Form Registrasi';
        return view('resepsionis.reservasi.create', compact('title','reservasi','walkInRegist'));
    }

    public function storeCheckIn(Request $request){
        $rooms = $request->input('room');

        $tamuHotel = new TamuHotel;
        $tamuHotel->jenis_id = $request->input('jenis_id');
        $tamuHotel->no_id = $request->input('no_id');
        $tamuHotel->nama = $request->input('nama');
        $tamuHotel->alamat = $request->input('alamat');
        $tamuHotel->no_telp = $request->input('no_telp');
        $tamuHotel->catatan = $request->input('catatan');
        $tamuHotel->tanggal_checkin = $request->input('tgl_checkin');
        $tamuHotel->tanggal_checkout = $request->input('tgl_checkout');
        // $tamuHotel->total_tagihan = $request->input('total_tagihan');
        $tamuHotel->status = $request->input('status');
        
        if (isset($rooms)) {
            $tamuHotel->save();
            $tamuHotel_id = $tamuHotel->id;
            $tamuHotel_tgl_chkin = $tamuHotel->tanggal_checkin;
            $tamuHotel_tgl_chkout = $tamuHotel->tanggal_checkout;
            $datetime1 = new DateTime($tamuHotel_tgl_chkin);
            $datetime2 = new DateTime($tamuHotel_tgl_chkout);
            $interval = $datetime1->diff($datetime2);
            $lamaMenginap = $interval->format('%a');

            foreach($rooms as $room) {
                $tagihanTamu = new TagihanTamu;
                $tagihanTamu->id_tamu = $tamuHotel_id;
                $tagihanTamu->id_kamar = $room;
                
                $kamar_id = $room;                
                $kamar = Kamar::where('id',$kamar_id)->first();
                $tagihanTamu->nama_tagihan = 'Kamar '.$kamar->no_kamar;
                $tagihanTamu->besaran = $kamar->harga * $lamaMenginap;

                $tagihanTamu->save();
            }
        } else {
            return redirect()->back()->with('alert', 'Belum memilih kamar!');
        }

        $id_reservasi = $request->input('id_reservasi');
        if (isset($id_reservasi)) {
            $reservasi = Reservasi::find($id_reservasi);
            $reservasi->status = 'Sudah Check-In';
            $reservasi->save();
        }

        return redirect()->route('guestin.index');
    }

    // public function editReservationToCheckin($id){
    //     $title = 'Form Registrasi';
    //     return view('resepsionis.reservasi.formregistrasi', compact('title'));
    // }

    public function ajaxReservasi(){
        $reservasi = DB::table('reservasi_kamar')
            ->select('reservasi.id as id_reservasi','kamar.id as id_kamar',
            'reservasi_kamar.id as id_reservasi_kamar',
            'reservasi.tanggal_checkin as tanggal_checkin',
            'reservasi.tanggal_checkout as tanggal_checkout',
            'reservasi.status as status_reservasi',)
            ->rightJoin('kamar', 'kamar.id', '=', 'reservasi_kamar.id_kamar')
            ->leftJoin('reservasi', 'reservasi.id', '=', 'reservasi_kamar.id_reservasi')
            ->whereNotIn('reservasi.status',["Batal Reservasi","Sudah Check-In"])
            ->orderBy('reservasi.id', 'asc')
            ->get();
        echo json_encode($reservasi);
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
