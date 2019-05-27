<div class="form-group">
    <label>Nama Barang</label>
    <input name="nama_barang" type="text" class="form-control" required value="{{ isset($barang->nama_barang) ? $barang->nama_barang : ''}}">
</div>
<div class="form-group">
    <label>Jenis Barang</label>
    <select class="form-control" name="jenis_barang" required>
        <option value="">Jenis Barang</option>
        <option value="Linen Supplies" {{ isset($barang->jenis_barang) && $barang->jenis_barang == "Linen Supplies" ? 'selected' : '' }}>Linen Supplies</option>
        <option value="Room Supplies" {{ isset($barang->jenis_barang) && $barang->jenis_barang == "Room Supplies" ? 'selected' : '' }}>Room Supplies</option>
        <option value="Guest Aminities" {{ isset($barang->jenis_barang) && $barang->jenis_barang == "Guest Aminities" ? 'selected' : '' }}>Guest Aminities</option>
    </select>
</div>
<div class="form-group">
    <label>Jumlah</label>
    <input name="jumlah" type="number" class="form-control" required value="{{ isset($barang->jumlah) ? $barang->jumlah : ''}}">
</div>
<hr>
<div class="float-right">
    <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Perbarui' : 'Tambah' }}">
</div>