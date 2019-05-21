<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TamuHotel extends Model
{
    protected $table = 'tamu_hotel';
    protected $fillable = [
        'jenis_id','no_id','nama','alamat','no_telp','catatan',
        'tanggal_checkin','tanggal_checkout','total_tagihan','status'
    ];

    public function tagihan_tamu()
    {
        return $this->hasMany('App\TagihanTamu','id_tamu');
    }
}
