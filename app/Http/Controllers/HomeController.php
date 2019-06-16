<?php

namespace App\Http\Controllers;

use App\Barang;
use App\TamuHotel;
use App\Reservasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('type:manager,super_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';

        $weekstart = strtotime('last monday', strtotime('tomorrow'));
        $weekend = strtotime('+6 days', $weekstart);

        $weeklyguest = DB::table('tamu_hotel')
            ->join('tagihan_tamu', 'tamu_hotel.id', '=', 'tagihan_tamu.id_tamu')
            ->where('tagihan_tamu.nama_tagihan', 'like', 'Kamar%')
            ->where('tamu_hotel.tanggal_checkin', '<=', date('Y-m-d', $weekend))
            ->where('tamu_hotel.tanggal_checkout', '>=', date('Y-m-d', $weekstart))
            ->count();

        $totalcurrentrsv = DB::table('reservasi')->where('status', 'LIKE', '%Konfirmasi%')->count();

        $totalreservasi = DB::table('reservasi')->count();
        $totalbatalrsv = DB::table('reservasi')->where('status', 'Batal Reservasi')->count();
        $ratebatal = ($totalbatalrsv/$totalreservasi) * 100;
        $prsentasebatal = round($ratebatal);

        $minbarang = Barang::orderBy('jumlah', 'asc')->first();

        $day_after_tomorrow = date('Y-m-d', strtotime('tomorrow + 1 day'));

        $reminder = Reservasi::where('status','Belum Konfirmasi')->where('tanggal_checkin','<=',$day_after_tomorrow)->orderBy('tanggal_checkin', 'asc')->get();

        // dd($reminder);


        return view('home', compact('title','weeklyguest','totalcurrentrsv','prsentasebatal','minbarang','reminder'));
    }
}
