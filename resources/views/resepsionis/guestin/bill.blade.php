<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BILL #{{ $tamu->id }}</title>

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
                    <p class="text-center" style="font-size:xx-large;color:white;padding-top:8px">BILL #{{ $tamu->id }}</p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="row">
            <table class="table table-borderless table-sm">
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
                            {{$diff->format("%a")}} Malam
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="row">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Nama Tagihan</th>
                        <th>Besaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tamu->tagihan_tamu->sortBy('id_kamar') as $item)
                        <tr>
                            <td>{{$item->nama_tagihan}}</td>
                            <td>Rp. {{number_format($item->besaran)}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Grand Total</th>
                        <th>Rp. {{ number_format($tamu->total_tagihan) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <br><br>
    </section>
    <footer>
        <table class="table table-borderless">
            <tbody class="text-center">
                <tr>
                    <td><br></td>
                    <td>Pamekasan, ______________</td>
                </tr>
                <tr>
                    <td>Guest</td>
                    <td>Receptionist</td>
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