<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'no_id','jenis_id','nama','alamat','no_telp','catatan'
    ];
}
