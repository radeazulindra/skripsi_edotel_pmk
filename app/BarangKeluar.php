<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $fillable = [
        'id_barang','tanggal_keluar','jumlah','nama_pegawai','tujuan'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang','id_barang');
    }
}
