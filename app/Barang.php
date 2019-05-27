<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang','jenis_barang','jumlah'
    ];

    public function barang_keluar()
    {
        return $this->hasMany('App\BarangKeluar','id_barang');
    }
    
    // public function tagihan_tamu()
    // {
    //     return $this->hasMany('App\TagihanTamu','id_kamar');
    // }
}
