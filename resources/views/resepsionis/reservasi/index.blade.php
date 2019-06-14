@extends('layouts.app')

@section('content')
    
    <!-- DataTales Reservasi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Reservasi</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mx-1 mb-4">
                    <a href="{{ route('reservasi.create') }}" class="btn btn-success btn-xl">
                        Reservasi
                    </a>
                </div>
                <div class="mx-1 mb-4">
                    <a href="{{ route('createCheckIn') }}" class="btn btn-success btn-xl">
                        Walk In Guest Check-In
                    </a>
                </div>
            </div>

            <h4>Tamu Sudah Konfirmasi Reservasi</h4>
            <div class="table">
                <table class="ui blue celled table tableReservasi" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Check-In</th>
                            <th>Tanggal Check-Out</th>
                            <th>Lama Menginap</th>
                            <th>Catatan</th>
                            <th>Harga (Rp.)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sudahKonfirmasi as $itemResv)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itemResv->nama }}</td>
                            <td>{{ $itemResv->no_telp }}</td>
                            <td>
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    {{ $item->kamar->no_kamar }}<br>
                                @endforeach
                            </td>
                            <td>{{ $itemResv->tanggal_checkin }}</td>
                            <td>{{ $itemResv->tanggal_checkout }}</td>
                            <td>
                                @php
                                    $from = date_create($itemResv->tanggal_checkin);
                                    $to = date_create($itemResv->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Hari
                            </td>
                            <td>{{ $itemResv->catatan }}</td>
                            <td>
                                @php
                                    $harga=0;
                                @endphp
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    @php
                                        $harga+=$item->kamar->harga*$diff->format("%a");
                                    @endphp
                                @endforeach
                                {{ number_format($harga) }}
                            </td>
                            <td>{{ $itemResv->status }}</td>
                            <td>
                                @if ($itemResv->status == "Belum Konfirmasi")
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Sudah Konfirmasi']) }}">
                                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                                    </a>
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Batal Reservasi']) }}">
                                        <button class="btn btn-danger btn-sm">Batal</button>
                                    </a>
                                @elseif ($itemResv->status == "Sudah Konfirmasi")
                                    <a href="{{ route('createCheckInWithID', ['id'=>$itemResv->id]) }}"><button class="btn btn-primary btn-sm">Check-In</button></a><br>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            <h4>Tamu Belum Konfirmasi Reservasi</h4>
            <div class="table">
                <table class="ui blue celled table tableReservasi" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Check-In</th>
                            <th>Tanggal Check-Out</th>
                            <th>Lama Menginap</th>
                            <th>Catatan</th>
                            <th>Harga (Rp.)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belumKonfirmasi as $itemResv)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itemResv->nama }}</td>
                            <td>{{ $itemResv->no_telp }}</td>
                            <td>
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    {{ $item->kamar->no_kamar }}<br>
                                @endforeach
                            </td>
                            <td>{{ $itemResv->tanggal_checkin }}</td>
                            <td>{{ $itemResv->tanggal_checkout }}</td>
                            <td>
                                @php
                                    $from = date_create($itemResv->tanggal_checkin);
                                    $to = date_create($itemResv->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Hari
                            </td>
                            <td>{{ $itemResv->catatan }}</td>
                            <td>
                                @php
                                    $harga=0;
                                @endphp
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    @php
                                        $harga+=$item->kamar->harga*$diff->format("%a");
                                    @endphp
                                @endforeach
                                {{ number_format($harga) }}
                            </td>
                            <td>{{ $itemResv->status }}</td>
                            <td>
                                @if ($itemResv->status == "Belum Konfirmasi")
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Sudah Konfirmasi']) }}">
                                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                                    </a>
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Batal Reservasi']) }}">
                                        <button class="btn btn-danger btn-sm">Batal</button>
                                    </a>
                                @elseif ($itemResv->status == "Sudah Konfirmasi")
                                    <a href="{{ route('createCheckInWithID', ['id'=>$itemResv->id]) }}"><button class="btn btn-primary btn-sm">Check-In</button></a><br>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4>Tamu Sudah Check-In</h4>
            <div class="table">
                <table class="ui blue celled table tableReservasi" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Check-In</th>
                            <th>Tanggal Check-Out</th>
                            <th>Lama Menginap</th>
                            <th>Catatan</th>
                            <th>Harga (Rp.)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sudahCheckIn as $itemResv)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itemResv->nama }}</td>
                            <td>{{ $itemResv->no_telp }}</td>
                            <td>
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    {{ $item->kamar->no_kamar }}<br>
                                @endforeach
                            </td>
                            <td>{{ $itemResv->tanggal_checkin }}</td>
                            <td>{{ $itemResv->tanggal_checkout }}</td>
                            <td>
                                @php
                                    $from = date_create($itemResv->tanggal_checkin);
                                    $to = date_create($itemResv->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Hari
                            </td>
                            <td>{{ $itemResv->catatan }}</td>
                            <td>
                                @php
                                    $harga=0;
                                @endphp
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    @php
                                        $harga+=$item->kamar->harga*$diff->format("%a");
                                    @endphp
                                @endforeach
                                {{ number_format($harga) }}
                            </td>
                            <td>{{ $itemResv->status }}</td>
                            <td>
                                @if ($itemResv->status == "Belum Konfirmasi")
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Sudah Konfirmasi']) }}">
                                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                                    </a>
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Batal Reservasi']) }}">
                                        <button class="btn btn-danger btn-sm">Batal</button>
                                    </a>
                                @elseif ($itemResv->status == "Sudah Konfirmasi")
                                    <a href="{{ route('createCheckInWithID', ['id'=>$itemResv->id]) }}"><button class="btn btn-primary btn-sm">Check-In</button></a><br>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4>Tamu Batal Reservasi</h4>
            <div class="table">
                <table class="ui blue celled table tableReservasi" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Check-In</th>
                            <th>Tanggal Check-Out</th>
                            <th>Lama Menginap</th>
                            <th>Catatan</th>
                            <th>Harga (Rp.)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($batalReservasi as $itemResv)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itemResv->nama }}</td>
                            <td>{{ $itemResv->no_telp }}</td>
                            <td>
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    {{ $item->kamar->no_kamar }}<br>
                                @endforeach
                            </td>
                            <td>{{ $itemResv->tanggal_checkin }}</td>
                            <td>{{ $itemResv->tanggal_checkout }}</td>
                            <td>
                                @php
                                    $from = date_create($itemResv->tanggal_checkin);
                                    $to = date_create($itemResv->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Hari
                            </td>
                            <td>{{ $itemResv->catatan }}</td>
                            <td>
                                @php
                                    $harga=0;
                                @endphp
                                @foreach ($itemResv->reservasi_kamar as $item)
                                    @php
                                        $harga+=$item->kamar->harga*$diff->format("%a");
                                    @endphp
                                @endforeach
                                {{ number_format($harga) }}
                            </td>
                            <td>{{ $itemResv->status }}</td>
                            <td>
                                @if ($itemResv->status == "Belum Konfirmasi")
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Sudah Konfirmasi']) }}">
                                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                                    </a>
                                    <a href="{{ route('updateStatus', ['id'=>$itemResv->id,'newstatus'=>'Batal Reservasi']) }}">
                                        <button class="btn btn-danger btn-sm">Batal</button>
                                    </a>
                                @elseif ($itemResv->status == "Sudah Konfirmasi")
                                    <a href="{{ route('createCheckInWithID', ['id'=>$itemResv->id]) }}"><button class="btn btn-primary btn-sm">Check-In</button></a><br>
                                @endif
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
		$('.tableReservasi').DataTable();
    } );
    </script>
@endsection
