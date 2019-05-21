<form action="{{ route('storeCheckIn') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-6">
            <label for="tgl_checkin">Tanggal Check-In *</label>
            <input name="tgl_checkin" id="dateFrom" type="date" class="form-control" readonly="@if($walkInRegist == false) {{'readonly'}} @endif" required value="{{ isset($reservasi->tanggal_checkin) ? $reservasi->tanggal_checkin : ''}}">
        </div>
        <div class="col-6">
            <label for="tgl_checkout">Tanggal Check-Out *</label>
            <input name="tgl_checkout" id="dateTo" type="date" class="form-control" readonly="@if($walkInRegist == false) {{'readonly'}} @endif" required value="{{ isset($reservasi->tanggal_checkout) ? $reservasi->tanggal_checkout : ''}}">
        </div>
        <div class="col-12 my-3">
            @if (!$walkInRegist)
                @foreach ($reservasi->reservasi_kamar as $item)
                    <input checked id="room-{{ $item->kamar->id }}" name="room[]" class="room-select" type="checkbox" value="{{ $item->kamar->id }}"/>
                    <label for="room-{{ $item->kamar->id }}" class="room selected">{{ $item->kamar->no_kamar }}<br>{{ $item->kamar->tipe_kamar }} Room</label>
                @endforeach    
            @else
                <div class="btn btn-info float-right" onclick="buatSelector()">Cari Kamar</div>
            @endif
        </div>
    </div>
    <div class="row" id="daftar_kamar"></div>
    <hr>
    <div class="form-group">
        <label>Jenis ID *</label>
        <input name="jenis_id" type="text" class="form-control" required placeholder="cth: KTP/SIM">
    </div>
    <div class="form-group">
        <label>Nomor ID *</label>
        <input name="no_id" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nama *</label>
        <input name="nama" type="text" class="form-control" readonly="@if($walkInRegist == false) {{'readonly'}} @endif" required value="{{ isset($reservasi->nama) ? $reservasi->nama : ''}}">
    </div>
    <div class="form-group">
        <label>Alamat *</label>
        <input name="alamat" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nomor Telepon *</label>
        <input name="no_telp" type="number" class="form-control" readonly="@if($walkInRegist == false) {{'readonly'}} @endif" required value="{{ isset($reservasi->no_telp) ? $reservasi->no_telp : ''}}">
    </div>
    <div class="form-group">
        <label>Catatan</label>
        <input name="catatan" type="text" class="form-control" value="{{ isset($reservasi->catatan) ? $reservasi->catatan : ''}}">
    </div>
    <input hidden name="status" type="text" value="Check-In">
    @if (!$walkInRegist)
        <input hidden name="id_reservasi" type="text" value="{{$reservasi->id}}">
    @endif
    <hr>
        <h3>Total:</h3>
        <td>
        @if (!$walkInRegist)
            @php
                $from = date_create($reservasi->tanggal_checkin);
                $to = date_create($reservasi->tanggal_checkout);
                $diff = date_diff($from, $to);
                $harga=0;
            @endphp
            @foreach ($reservasi->reservasi_kamar as $item)
                @php
                    $harga+=$item->kamar->harga*$diff->format("%a");
                @endphp
            @endforeach   
            Rp. {{ number_format($harga) }}<br>
            <input name="total_tagihan" type="number" hidden value="{{ $harga }}">
        @else
            <label id="total_harga"></label>
        @endif
    <div class="float-right">
        <a href=""><input type="submit" class="btn btn-success" value="Check-In"></a>
    </div>
</form>