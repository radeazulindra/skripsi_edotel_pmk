<?php

namespace App\Http\Controllers;

use App\Barang;
use App\TamuHotel;
use App\Reservasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Charts\TamuPerbulan;

use DateTime;

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

        $dayaftertomorrow = date('Y-m-d', strtotime('tomorrow + 1 day'));
        $reminder = Reservasi::where('status','Belum Konfirmasi')->where('tanggal_checkin','<=',$dayaftertomorrow)->orderBy('tanggal_checkin', 'asc')->get();

        $month = collect([]);
        $totalguest = collect([]);
        for ($i = 1; $i <= 12; $i++) { 
            $monthnum = '0'.$i;

            $guestdata = TamuHotel::whereMonth('tanggal_checkin', $monthnum)->count();
            $totalguest->push($guestdata);
        }

        $chart = new TamuPerbulan;
        $chart->labels(['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']);
        $chart->dataset('Jumlah Tamu', 'line', $totalguest)->lineTension(0.3)->backgroundColor("rgba(78, 115, 223, 0.05)")->color("rgba(78, 115, 223, 1)");
        $chart->options([
            'tooltips' => [
                'show' => true,
                'backgroundColor' => "rgb(255,255,255)",
                'bodyFontColor' => "#858796",
                'titleMarginBottom' => 10,
                'titleFontColor' => '#6e707e',
                'titleFontSize' => 14,
                'borderColor' => '#dddfeb',
                'borderWidth' => 1,
                'xPadding' => 15,
                'yPadding' => 15,
                'displayColors' => false,
                'intersect' => false,
                'mode' => 'index',
                'caretPadding' => 10
            ],
            'legend' => [
                'display' => false
            ],
            'layout' => [
                'padding' => [
                    'left' => 10,
                    'right' => 25,
                    'top' => 25,
                    'bottom' => 0
                ]
            ],
        ]);
        $thismonthyear = date('F Y');

        return view('home', compact('title','weeklyguest','totalcurrentrsv','prsentasebatal','minbarang','reminder','chart','thismonthyear'));
    }
}
