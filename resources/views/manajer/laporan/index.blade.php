@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <div class="form-row row">
                <div class="col-6">
                    <form action="{{ route('printtranstamu') }}" method="POST" class="row">
                        {{ csrf_field() }}

                        <p class="col-12">Laporan Bulanan Transaksi Tamu *</p>
                        <div class="col-8">
                            <input name="monthyear" type="month" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank"><input type="submit" class="btn btn-info" value="Lihat Laporan"></a>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <form action="{{ route('printpenggunaanbrg') }}" method="POST" class="row">
                        {{ csrf_field() }}
        
                        <p class="col-12">Laporan Bulanan Penggunaan Barang *</p>
                        <div class="col-8">
                            <input name="monthyear" type="month" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank"><input type="submit" class="btn btn-info" value="Lihat Laporan"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection