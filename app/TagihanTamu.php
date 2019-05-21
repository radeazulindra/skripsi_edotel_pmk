<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagihanTamu extends Model
{
    protected $table = 'tagihan_tamu';
    protected $fillable = [
        'id_tamu','id_kamar','nama_tagihan','besaran'
    ];

    public function tamu_hotel()
    {
        return $this->belongsTo('App\TamuHotel','id_tamu');
    }

    public function kamar()
    {
        return $this->belongsTo('App\Kamar','id_kamar'); 
    }
}
