<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">

</head>
<body class="container-fluid">
    <header>
        <div class="row">
            <div class="company-info">
                <h2 class="title">{{ config('app.name', 'Laravel') }}</h2>
                <p class="subtitle">Jl. Kabupaten No. 103, Pamekasan | (0324) 335156</p>
                <div class="title" style="background-color:#2A8EAC">
                    <p class="text-center" style="font-size:xx-large;color:white;padding-top:8px">Laporan Bulanan Transaksi Tamu</p>
                </div>
            </div>
            <div>
                <p class="float-right">{{$month}} {{$year}}</p>
            </div>
        </div>
    </header>
    <br>
    <section>
        <div class="row">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr class="text-center">
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
                                <td class="text-center">{{$varnumb++}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$itemtagihan->nama_tagihan}}</td>
                                <td class="text-center">{{$item->tanggal_checkin}}</td>
                                <td class="text-center">{{$item->tanggal_checkout}}</td>
                                <td class="text-center">
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
                        <th colspan="6" class="text-center">Grand Total</th>
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
        </div>
    </section>
    <br>
    <footer>
        <table class="table table-borderless">
            <tbody class="text-center">
                <tr>
                    <td><br></td>
                    <td>Pamekasan, {{$todayDate}}</td>
                </tr>
                <tr>
                    <td>Manager</td>
                    <td>Accounting</td>
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