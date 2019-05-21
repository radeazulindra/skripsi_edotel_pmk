<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTamuHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamu_hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_id',25);
            $table->string('no_id',50);
            $table->string('nama',50);
            $table->string('alamat',50);
            $table->string('no_telp',25);
            $table->string('catatan',255);
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->string('status',50);
            $table->decimal('total_tagihan', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamu_hotel');
    }
}
