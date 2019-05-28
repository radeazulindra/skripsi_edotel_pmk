<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = [
        'id_barang','tanggal_masuk','jumlah','gambar_nota'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang','id_barang');
    }
}
