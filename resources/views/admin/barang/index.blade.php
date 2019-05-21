@extends('layouts.app')

@section('content')
    
    <!-- DataTales Barang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Barang</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <table id="example" class="ui blue celled table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>HDK-01</td>
                            <td>Handuk</td>
                            <td>Linen</td>
                            <td>10</td>
                            <td>
                                <a href="#"><button class="btn btn-primary btn-sm">Perbarui</button></a>

                                <form method="POST" action="#" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Apakah anda yakin ingin menghapus pelanggan ini?&quot;)">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="m-3 float-right">
                <a href="#" class="btn btn-success btn-xl">
                    Tambah Barang
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