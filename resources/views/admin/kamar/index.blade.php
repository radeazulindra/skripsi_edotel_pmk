@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- DataTales Kamar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Kamar</h6>
        </div>
        <div class="card-body">
            <div class="mx-1 mb-4">
                <a href="{{ route('kamar.create') }}" class="btn btn-success btn-xl">
                    Tambah Kamar
                </a>
            </div>
            <div class="table">
                <table id="example" class="ui blue celled table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_kamar }}</td>
                                <td>{{ $item->tipe_kamar }}</td>
                                <td>Rp. {{ $item->harga }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('kamar.edit', ['id'=>$item->id]) }}"><button class="btn btn-primary btn-sm">Perbarui</button></a>
    
                                    <form method="POST" action="{{ route('kamar.destroy', ['id'=>$item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Apakah anda yakin ingin menghapus kamar {{$item->no_kamar}}?&quot;)">Hapus</button>
                                    </form>
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