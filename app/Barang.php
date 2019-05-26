<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang','jenis_barang','jumlah'
    ];

    // public function reservasi_kamar()
    // {
    //     return $this->hasMany('App\ReservasiKamar','id_kamar');
    // }
    // public function tagihan_tamu()
    // {
    //     return $this->hasMany('App\TagihanTamu','id_kamar');
    // }
}
