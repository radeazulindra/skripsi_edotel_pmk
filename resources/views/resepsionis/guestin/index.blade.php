@extends('layouts.app')

@section('content')
    
    <!-- DataTales Guest In House -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <table id="example" class="ui blue celled table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Check-In</th>
                            <th>Tanggal Check-Out</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $item)
                        <tr>
                            <td>1</td>
                            <td>{{$item->jenis_id}} - {{$item->no_id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                @foreach ($item->tagihan_tamu as $itemnk)
                                    @if (stripos($itemnk->nama_tagihan,'kamar') !== false)
                                        {{ $itemnk->kamar->no_kamar }}<br>
                                    @endif
                                @endforeach 
                            </td>
                            <td>{{ $item->tanggal_checkin }}</td>
                            <td>{{ $item->tanggal_checkout }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('guestin.show', ['id'=>$item->id]) }}"><button class="btn btn-success btn-sm">View</button></a><br>
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
