@extends('layouts.app')

@section('content')
    
    <!-- DataTales Pelanggan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <table id="example" class="ui blue celled table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor ID</th>
                            <th>Jenis ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->no_id}}</td>
                                <td>{{$item->jenis_id}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->no_telp}}</td>
                                <td>{{$item->catatan}}</td>
                                <td>
                                    <a href="#"><button disabled class="btn btn-primary btn-sm">Perbarui</button></a>
    
                                    <form method="POST" action="#" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button disabled type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Apakah anda yakin ingin menghapus pelanggan ini?&quot;)">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
            <div class="m-3 float-right">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-xl">
                    Tambah Pelanggan
                </a>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
		$('#example').DataTable();
    } );
    </script>
@endsection
