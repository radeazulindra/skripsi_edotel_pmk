@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
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
                        @foreach ($bKeluar as $item)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Barang->nama_barang }}</td>
                                <td>{{ $item->tanggal_keluar }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>
                                    <a href="{{ route('barangkeluar.edit', ['id'=>$item->id]) }}">
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                    </a><br>
                                </td>
                            </tr>
                        @endforeach
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