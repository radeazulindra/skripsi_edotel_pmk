@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control">
                    <option>Sabun</option>
                    <option>Handuk</option>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label>Tanggal Barang Keluar</label>
                <input id="datePicker" type="date" class="form-control tglBarangKeluar" required>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" required max="50">{{--LIMIT BARANG JGN LUPA DIISI--}}
                <p>Stok barang saat ini = 50</p>
            </div>
            <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" class="form-control" required>
            </div>
            <hr>
            <div class="float-right">
                <a href="{{ route('barangkeluar.index') }}"><button class="btn btn-success">Tambah</button></a>
                <a href="{{ route('barangkeluar.index') }}"><button class="btn btn-danger">Kembali</button></a>
            </div>
        </div>
    </div>

    <script>
        // IF TAMBAH RUN THIS
        $(document).ready( function() {
            var now = new Date();
            var month = (now.getMonth() + 1);               
            var day = now.getDate();
            if (month < 10) 
                month = "0" + month;
            if (day < 10) 
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#datePicker').val(today);
        });

        // IF EDIT
        // DELET ID DATEPICKER
    </script>
@endsection