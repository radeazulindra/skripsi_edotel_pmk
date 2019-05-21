<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservasiKamar extends Model
{
    protected $table = 'reservasi_kamar';
    protected $fillable = [
        'id_reservasi','id_kamar'
    ];

    public function reservasi()
    {
        return $this->belongsTo('App\Reservasi','id_reservasi');
    }

    public function kamar()
    {
        return $this->belongsTo('App\Kamar','id_kamar'); 
    }
}
