<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $fillable = [
        'no_kamar','tipe_kamar','harga','status'
    ];

    public function reservasi_kamar()
    {
        return $this->hasMany('App\ReservasiKamar','id_kamar');
    }
    public function tagihan_tamu()
    {
        return $this->hasMany('App\TagihanTamu','id_kamar');
    }
}
