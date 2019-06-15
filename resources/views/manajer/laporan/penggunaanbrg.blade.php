<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        header .company-info {
            color: #BDB9B9;
            margin-bottom: 20px;
        }
        header .company-info .title{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2A8EAC;
            font-weight: 600;
            font-size: 2em;
        }
    </style>
</head>
<body>
    <header>
        <div class="row">
            <div class="company-info col-12">
                <h2 class="title">edoTEL Pamekasan</h2>
                <span>Laporan Penggunaan Barang Bulanan</span>
            </div>
            <div class="col-12">
                <p class="float-right">{{$month}} {{$year}}</p>
            </div>
        </div>
    </header>
    <section>
        <div class="row">
            <p class="text-center" style="font-size: large;">Summary Penggunaan Barang</p>
            <hr>
        </div>
        <div class="row">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $varnumb = 1;
                    @endphp
                    @foreach ($barangSum as $item)
                        @php
                            if($item->total == NULL){
                                $item->total = 0;
                            }
                        @endphp
                        <tr>
                            <td class="text-center">{{$varnumb++}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td class="text-center">{{$item->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center">Grand Total</th>
                        <th class="text-center">
                            @php
                                $grandTotal=0;
                            @endphp
                            @foreach ($barangSum as $item)
                                    @php
                                        $grandTotal+=$item->total;
                                    @endphp
                            @endforeach
                            {{ $grandTotal }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <br>
        <br>
        <br>
        <br>
        
        <div class="row">
            <p class="text-center" style="font-size: large;">Detail Penggunaan Barang</p>
            <hr>
        </div>
        @foreach ($barangList as $itemList)
            @php
                $tempList = 0;
            @endphp
            @foreach ($barangKeluar as $item)
                @if ($itemList->id == $item->id_barang && $tempList != $itemList->id)
                    <div class="row">
                        <p>{{$itemList->nama_barang}}</p>
                    </div>
                    <div class="row">
                        <table class="table table-sm">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Tgl Barang Keluar</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $varnumb = 1;
                                @endphp
                                @foreach ($barangKeluar as $item)
                                    @if ($itemList->id == $item->id_barang)
                                        <tr>
                                            <td class="text-center">{{$varnumb++}}</td>
                                            <td>{{$item->barang->nama_barang}}</td>
                                            <td class="text-center">{{$item->tanggal_keluar}}</td>
                                            <td class="text-center">{{$item->jumlah}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-center">Total</th>
                                    <th class="text-center">
                                        @php
                                            $total=0;
                                        @endphp
                                        @foreach ($barangKeluar as $item)
                                            @if ($itemList->id == $item->id_barang)
                                                @php
                                                    $total+=$item->jumlah;
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ $total }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @php
                        $tempList = $itemList->id;
                    @endphp
                @endif
            @endforeach
        @endforeach
    </section>
    <footer>
        <table class="table table-borderless">
            <tbody class="text-center">
                <tr>
                    <td><br></td>
                    <td>Pamekasan, {{$todayDate}}</td>
                </tr>
                <tr>
                    <td>Manajer</td>
                    <td>Store Keeper</td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td>Radea</td>
                    <td>Radea</td>
                </tr>
                <tr>
                    <td>155150400111066</td>
                    <td>155150400111066</td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>
</html>