<div class="form-group">
    <label>Nomor Kamar</label>
    <input name="no_kamar" type="number" class="form-control" required value="{{ isset($kamar->no_kamar) ? $kamar->no_kamar : ''}}">
</div>
<div class="form-group">
    <label>Tipe Kamar</label>
    <input name="tipe_kamar" type="text" class="form-control" required value="{{ isset($kamar->tipe_kamar) ? $kamar->tipe_kamar : ''}}">
</div>
<div class="form-group">
    <label>Harga</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Rp.</div>
        </div>
        <input name="harga" type="number" class="form-control" required value="{{ isset($kamar->harga) ? $kamar->harga : ''}}">
    </div>
</div>
{{-- <div class="form-group">
    <label>Status</label>
    <input name="status" type="text" class="form-control" required value="{{ isset($kamar->status) ? $kamar->status : ''}}">
</div> --}}
<div class="form-group">
    <label>Status Kamar</label>
    <select class="form-control" name="jenis_barang" required>
        <option value="">Status Kamar</option>
        <option value="Tersedia" {{ isset($kamar->status) && $kamar->status == "Tersedia" ? 'selected' : '' }}>Tersedia</option>
        <option value="Dalam Perbaikan" {{ isset($kamar->status) && $kamar->status == "Dalam Perbaikan" ? 'selected' : '' }}>Dalam Perbaikan</option>
    </select>
</div>
<hr>
<div class="float-right">
    <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Perbarui' : 'Tambah' }}">
</div>