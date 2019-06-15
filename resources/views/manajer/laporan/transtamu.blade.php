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
<body class="container">
    <header class="row">
        <div class="company-info">
            <h2 class="title">edoTEL Pamekasan</h2>
            <span>Laporan Transaksi Bulanan</span>

            <p class="float-right">{{$month}} {{$year}}</p>
        </div>
    </header>
    <br>
    <section class="row">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Tagihan</th>
                    <th>Tgl Check-In</th>
                    <th>Tgl Check-Out</th>
                    <th>Lama Menginap</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $varnumb = 1;
                @endphp
                @foreach ($tamu as $item)
                    @foreach ($item->tagihan_tamu as $itemtagihan)
                    <tr>
                            <td>{{$varnumb++}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$itemtagihan->nama_tagihan}}</td>
                            <td>{{$item->tanggal_checkin}}</td>
                            <td>{{$item->tanggal_checkout}}</td>
                            <td>
                                @php
                                    $from = date_create($item->tanggal_checkin);
                                    $to = date_create($item->tanggal_checkout);
                                    $diff = date_diff($from, $to);
                                @endphp
                                {{$diff->format("%a")}} Malam
                            </td>
                            <td>Rp. {{number_format($itemtagihan->besaran)}}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">Total</th>
                    <th>
                        @php
                            $tagihan=0;
                        @endphp
                        @foreach ($tamu as $item)
                            @php
                                $tagihan+=$item->total_tagihan;
                            @endphp
                        @endforeach
                        Rp. {{ number_format($tagihan) }}
                    </th>
                </tr>
            </tfoot>
        </table>
    </section>
    <br>
    <footer class="row">
        <div class="col-6">
            <br><br>
            <p class="text-center">Manajer</p>
            <br><br><br>
            <p class="text-center">Radea</p>
            <p class="text-center">155150400111066</p>
        </div>
        <div class="col-6 float-right">
            <p class="text-center">Pamekasan, {{$todayDate}}</p>
            <br>
            <p class="text-center">Keuangan</p>
            <br><br><br>
            <p class="text-center">Radea</p>
            <p class="text-center">155150400111066</p>
        </div>
    </footer>
</body>
</html>