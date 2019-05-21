@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="mx-1 mb-4">
                <a href="{{ route('barangkeluar.create') }}" class="btn btn-success btn-xl">
                    Tambah
                </a>
            </div>
            <div class="table">
                <table id="example" class="ui blue celled table">
                    <thead>
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">ID Barang</th>
                            <th rowspan="2">Nama Barang</th>
                            <th colspan="4" class="mx-auto">Informasi Barang Keluar</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>Tanggal Barang Keluar</th>
                            <th>Jumlah</th>
                            <th>Nama Pegawai</th>
                            <th>Tujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>SBN</td>
                            <td>Sabun</td>
                            <td>2019-05-02</td>
                            <td>1</td>
                            <td>Sugiono - Room Boy</td>
                            <td>Restock kamar 101</td>
                            <td>
                                <a href="{{ route('barangkeluar.edit', ['id'=>1]) }}"><button class="btn btn-warning btn-sm">Edit</button></a><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection