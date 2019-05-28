@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body mx-auto">
            <a href="{{ route('printlappenjualan') }}" class="btn btn-primary btn-icon-split btn-lg mr-5">
                <span class="icon text-white-50">
                    <i class="fas fa-clipboard"></i>
                </span>
                <span class="text">Lihat Laporan Penjualan Hotel</span>
            </a>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg ml-5">
                <span class="icon text-white-50">
                    <i class="fas fa-clipboard"></i>
                </span>
                <span class="text">Lihat Laporan Penggunaan Barang</span>
            </a>
        </div>
    </div>

@endsection