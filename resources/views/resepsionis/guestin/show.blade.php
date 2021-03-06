@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Tamu #{{ $tamu->nama }}</h6>
        </div>
        <div class="card-body row">
            <div class="col-12">
                <a href="{{ route('guestin.index') }}">Kembali</a>
                <br><br>
            </div>
            <div class="table col-6">
                <table class="ui blue celled table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $tamu->jenis_id }} - {{ $tamu->no_id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $tamu->nama }}</td>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <td>{{ $tamu->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Check-In</th>
                            <td>{{ $tamu->tanggal_checkin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Check-Out</th>
                            <td>{{ $tamu->tanggal_checkout }}</td>
                        </tr>
                        <tr>
                            <th>Lama Menginap</th>
                            <td>
                                @php
                                    $from = date_create($tamu->tanggal_checkin);
                                    $to = date_create($tamu->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Hari
                            </td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{ $tamu->catatan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $tamu->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="ui blue celled table">
                    <thead>
                        <tr>
                            <th>Nama Tagihan</th>
                            <th>Besaran (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu->tagihan_tamu->sortBy('id_kamar') as $item)
                            <tr>
                                <td>
                                    {{$item->nama_tagihan}}
                                    @if (stripos($item->nama_tagihan,'kamar') === false)
                                        <a href="{{ route('destroytagihan', ['id'=>$item->id]) }}">
                                            <button style="display: {{ $tamu->status === 'Check-In' ? '' : 'none' }}" class="btn btn-danger btn-sm float-right" onclick="return confirm('Apakah anda yakin ingin menghapus tagihan {{$item->nama_tagihan}}?');">Hapus Tagihan</button>
                                        </a>
                                    @endif
                                </td>
                                <td>{{number_format($item->besaran)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Tagihan (Rp.)</th>
                            <th>
                                @php
                                    $tagihan=0;
                                @endphp
                                @foreach ($tamu->tagihan_tamu as $item)
                                    @php
                                        $tagihan+=$item->besaran;
                                    @endphp
                                @endforeach
                                {{ number_format($tagihan) }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
                <div class="mt-4" style="display: {{ $tamu->status === 'Check-In' ? '' : 'none' }}">
                    <h4 class="mb-2">Tambah Tagihan</h4>
                    <form action="{{ route('storetagihan') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="id_tamu" value="{{$tamu->id}}" hidden>
                        
                        <select class="form-control" name="id_kamar" required>
                            <option value="">Nomor Kamar</option>
                            @foreach ($tamu->tagihan_tamu as $item)
                                @if (stripos($item->nama_tagihan,'kamar') !== false)
                                    <option value="{{$item->kamar->id}}">Kamar {{$item->kamar->no_kamar}}</option>
                                @endif
                            @endforeach                        
                        </select>
                        
                        <div class="form-group">
                            <datalist id="tagihanList">
                                <select name="nama_tagihan">
                                    <option value="Air Mineral">Air Mineral</option>
                                    <option value="Diskon">Diskon</option>
                                    <option value="Extra Bed">Extra Bed</option>
                                    <option value="Tanpa Breakfast">Tanpa Breakfast</option>
                                </select>
                            </datalist>
                            <input name="nama_tagihan" id="nama_tagihan" type="text" class="form-control" placeholder="Nama Tagihan" required list="tagihanList" autocomplete="off">
                            <input name="besaran" id="besaran" type="number" class="form-control" placeholder="Besaran" required>
                        </div>
                        
                        <label class="radio-inline m-1">
                            <input id="radiotambah" type="radio" name="jenis_tagihan" value="+" required> Tagihan Tambahan
                        </label>
                        <label class="radio-inline m-1">
                            <input id="radiopotong" type="radio" name="jenis_tagihan" value="-"> Potongan Harga
                        </label>

                        <div class="float-right">
                            <button class="btn btn-success">Tambah Tagihan</button>
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="float-right">
                    <a href="{{ route('checkout', ['id'=>$tamu->id,'tagihan'=>$tagihan]) }}">
                        <button class="btn btn-danger" style="display: {{ $tamu->status === 'Check-In' ? '' : 'none' }}" onclick="return confirm('Apakah anda yakin ingin melakukan Check-Out tamu?');">Check-Out</button>
                    </a>
                    <a href="{{ route('printbill', ['id'=>$tamu->id]) }}" target="_blank">
                        <button class="btn btn-primary" style="display: {{ $tamu->status === 'Check-Out' ? '' : 'none' }}">Cetak Bill</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    $( "#nama_tagihan" ).on( "change", function() {
        console.log(this.value);
        if (this.value == 'Extra Bed') {
            $( "#besaran" ).val(75000);
            $("#radiotambah").prop("checked", true);
        } else if (this.value == 'Tanpa Breakfast') {
            $( "#besaran" ).val(15000);
            $("#radiopotong").prop("checked", true);
        }
    });
    </script>
@endsection