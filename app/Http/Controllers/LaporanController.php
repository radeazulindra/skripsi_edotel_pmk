<?php

namespace App\Http\Controllers;

use PDF;

use App\TamuHotel;
use App\Barang;
use App\BarangKeluar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Laporan';
        return view('manajer.laporan.index', compact('title'));
    }

    public function printLpTransaksi(Request $request){
        $monthYear = $request->input('monthyear');
        $data = explode('-',$monthYear);

        $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $monthName = $bulan[ (int)$data[1] ];
        $yearName = $data[0];

        $title = 'Laporan Transaksi Tamu Edotel Pamekasan - '.$monthName.' '.$yearName;

        $todayDate = date("d")." ".$bulan[ (int)date("m")]." ".date("Y");
        
        $tamu = TamuHotel::where('status','Check-Out')->whereMonth('tanggal_checkout',$data[1])->whereYear('tanggal_checkout',$data[0])->orderBy('tanggal_checkin', 'asc')->get();
 
        $pdf = PDF::loadview('manajer.laporan.transtamu',['title'=>$title,'tamu'=>$tamu,'todayDate'=>$todayDate,'month'=>$monthName,'year'=>$yearName]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();

        // return view('manajer.laporan.transtamu',['title'=>$title,'tamu'=>$tamu,'todayDate'=>$todayDate,'month'=>$monthName,'year'=>$yearName]);
    }

    public function printLpBarang(Request $request){
        $monthYear = $request->input('monthyear');
        $data = explode('-',$monthYear);

        $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $monthName = $bulan[ (int)$data[1] ];
        $yearName = $data[0];

        $title = 'Laporan Penggunaan Barang Edotel Pamekasan - '.$monthName.' '.$yearName;

        $todayDate = date("d")." ".$bulan[ (int)date("m")]." ".date("Y");

        $barangKeluar = BarangKeluar::whereMonth('tanggal_keluar',$data[1])->whereYear('tanggal_keluar',$data[0])->orderBy('tanggal_keluar','asc')->get();

        $barangList = Barang::all();

        $barangSum = DB::table('barang_keluar')->select('barang.nama_barang',DB::raw('SUM(barang_keluar.jumlah) as total'))->rightJoin('barang','barang_keluar.id_barang','=','barang.id')->groupBy('barang.id')->orderBy('barang.id', 'asc')->get();

        $pdf = PDF::loadview('manajer.laporan.penggunaanbrg',['title'=>$title,'barangKeluar'=>$barangKeluar,'barangList'=>$barangList,'barangSum'=>$barangSum,'todayDate'=>$todayDate,'month'=>$monthName,'year'=>$yearName]);
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();

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
