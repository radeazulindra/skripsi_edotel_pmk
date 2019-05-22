<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill #{{ $tamu->id }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <h1>EDOTEL PAMEKASAN</h1>

    <br><br>
    <h5>BILL</h5>
    <table class="table table-striped table-sm">
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

    <br><br>

    <table class="table">
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
                    </td>
                    <td>{{number_format($item->besaran)}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Total Tagihan <span class="float-right">Rp.</span></th>
                <th>
                    {{ number_format($tamu->total_tagihan) }}
                </th>
            </tr>
        </tfoot>
    </table>
</body>
</html>