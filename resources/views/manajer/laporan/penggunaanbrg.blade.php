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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #BDB9B9;
            margin-bottom: 20px;
        }
        header .company-info .title{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2A8EAC;
            font-weight: 600;
            font-size: 2em;
            margin-bottom: 0;
        }
        header .company-info .subtitle{
            color: #BDB9B9;
            margin-top: 0;
        }
        hr {
            height: 1px;
            /* Set the hr color */
            color: #2A8EAC;
            background-color: #2A8EAC; /* Modern Browsers */
        }
    </style>
</head>
<body>
    <header>
        <div class="row">
            <div class="company-info">
                <h2 class="title">{{ config('app.name', 'Laravel') }}</h2>
                <p class="subtitle">Jl. Kabupaten No. 103, Pamekasan | (0324) 335156</p>
                <div class="title" style="background-color:#2A8EAC">
                    <p class="text-center" style="font-size:xx-large;color:white;padding-top:8px">Laporan Bulanan Penggunaan Barang</p>
                </div>
            </div>
            <div>
                <p class="float-right">{{$month}} {{$year}}</p>
            </div>
        </div>
    </header>
    <section>
        <div class="row">
            <p class="text-center" style="font-size:medium;">Summary Penggunaan Barang</p>
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
            <p class="text-center" style="font-size:medium;">Detail Penggunaan Barang</p>
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
                    <td>Manager</td>
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
                    <td>____________________</td>
                    <td>____________________</td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>
</html>