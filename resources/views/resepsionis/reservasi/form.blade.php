<form action="{{ route('reservasi.store') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-6">
            <label for="tgl_checkin">Tanggal Check-In *</label>
            <input name="tgl_checkin" id="dateFrom" type="date" class="form-control" required>
        </div>
        <div class="col-6">
            <label for="tgl_checkout">Tanggal Check-Out *</label>
            <input name="tgl_checkout" id="dateTo" type="date" class="form-control" required>
        </div>
        <div class="col-12 my-3">
            <div class="btn btn-info float-right" onclick="buatSelector()">Cari Kamar</div>
        </div>
    </div>
    <div class="row" id="daftar_kamar"></div>
    <hr>
    <div class="form-group">
        <label>Nama *</label>
        <input name="nama" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nomor Telepon *</label>
        <input name="no_telp" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Catatan</label>
        <input name="catatan" type="text" class="form-control">
    </div>
    <input hidden name="status" type="text" value="Belum Konfirmasi">
    <hr>
        <h3>Total:</h3>
        <label id="total_harga"></label>
    <div class="float-right">
        <a href=""><input type="submit" class="btn btn-success" value="Reservasi"></a>
    </div>
</form>