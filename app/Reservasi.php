<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = [
        'nama','no_telp','catatan','tanggal_checkin','tanggal_checkout', 'status'
    ];

    public function reservasi_kamar()
    {
        return $this->hasMany('App\ReservasiKamar','id_reservasi');
    }
}
