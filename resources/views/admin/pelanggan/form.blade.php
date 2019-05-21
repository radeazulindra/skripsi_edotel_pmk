<div class="form-group">
    <label>Nomor ID</label>
    <input name="no_id" type="number" class="form-control" required value="{{ isset($pelanggan->no_id) ? $pelanggan->no_id : ''}}">
</div>
<div class="form-group">
    <label>Jenis ID</label>
    <input name="jenis_id" type="text" class="form-control" required value="{{ isset($pelanggan->jenis_id) ? $pelanggan->jenis_id : ''}}">
</div>
<div class="form-group">
    <label>Nama</label>
    <input name="nama" type="text" class="form-control" required value="{{ isset($pelanggan->nama) ? $pelanggan->nama : ''}}">
</div>
<div class="form-group">
    <label>Alamat</label>
    <input name="alamat" type="text" class="form-control" required value="{{ isset($pelanggan->alamat) ? $pelanggan->alamat : ''}}">
</div>
<div class="form-group">
    <label>No Telepon</label>
    <input name="no_telp" type="number" class="form-control" required value="{{ isset($pelanggan->no_telp) ? $pelanggan->no_telp : ''}}">
</div>
<div class="form-group">
    <label>Catatan</label>
    <input name="catatan" type="text" class="form-control" value="{{ isset($pelanggan->catatan) ? $pelanggan->catatan : ''}}">
</div>

<hr>
<div class="float-right">
    <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Perbarui' : 'Tambah' }}">
</div>