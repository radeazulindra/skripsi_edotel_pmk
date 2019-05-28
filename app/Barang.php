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
    
    public function barang_masuk()
    {
        return $this->hasMany('App\BarangMasuk','id_barang');
    }
}
