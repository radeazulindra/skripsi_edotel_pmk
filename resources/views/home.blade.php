@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Tamu (Mingguan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$weeklyguest}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Reservasi Saat Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalcurrentrsv}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Persentase Pembatalan Reservasi</div>
                            <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$prsentasebatal}}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$prsentasebatal}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Stok Barang Hampir Habis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$minbarang->nama_barang}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">Tamu Hotel Perbulan</h6>
                    <span>{{$thismonthyear}}</span>
                    <br>
                    {{-- <div>
                        <canvas id="myAreaChart" width="400" height="400"></canvas>
                    </div> --}}
                    <div>
                        {!! $chart->container() !!}
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="m-0 font-weight-bold text-primary">Pengingat Konfirmasi</h6>
                    <span>Konfirmasi Reservasi H-2 Kedatangan</span>
                    <br>
                    <div>
                        <table class="table table-sm table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>No Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reminder as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>
                                            @foreach ($item->reservasi_kamar as $itemK)
                                                {{ $itemK->kamar->no_kamar }}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $chart->script() !!}

@endsection