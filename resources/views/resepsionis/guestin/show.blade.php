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
                                        <a href="{{ route('destroyTagihan', ['id'=>$item->id]) }}">
                                            <button {{ $tamu->status === 'Check-In' ? '' : 'Disabled' }} class="btn btn-danger btn-sm float-right">Hapus Tagihan</button>
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
                <div class="mt-4">
                    <h4 class="mb-2">Tambah Tagihan</h4>
                    <form action="{{ route('guestin.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="id_tamu" value="{{$tamu->id}}" hidden>
                        
                        <select class="form-control" name="id_kamar" required {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}>
                            <option></option>
                            @foreach ($tamu->tagihan_tamu as $item)
                                @if (stripos($item->nama_tagihan,'kamar') !== false)
                                    <option value="{{$item->kamar->id}}">{{$item->kamar->no_kamar}}</option>
                                @endif
                            @endforeach                        
                        </select>
                        
                        <div class="form-group">
                            <input name="nama_tagihan" type="text" class="form-control" placeholder="Nama Tagihan" required {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}>
                            <input name="besaran" type="number" class="form-control" placeholder="Besaran" required {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}>
                        </div>
                        
                        <label class="radio-inline m-1">
                            <input type="radio" name="jenis_tagihan" value="+" required {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}> Tagihan Tambahan
                        </label>
                        <label class="radio-inline m-1">
                            <input type="radio" name="jenis_tagihan" value="-" {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}> Potongan Harga
                        </label>

                        <div class="float-right">
                            <button {{$tamu->status === 'Check-In' ? '' : 'Disabled' }} class="btn btn-info">Tambah Tagihan</button>
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="float-right">
                    <a href="{{ route('checkOut', ['id'=>$tamu->id,'tagihan'=>$tagihan]) }}">
                        <button class="btn btn-danger" {{$tamu->status === 'Check-In' ? '' : 'Disabled' }}>Check-Out</button>
                    </a>
                    <a href="#">
                        <button class="btn btn-success" {{$tamu->status === 'Check-Out' ? '' : 'Disabled' }}>Cetak Nota</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection