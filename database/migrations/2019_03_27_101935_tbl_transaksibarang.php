<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblTransaksibarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaksibarang', function (Blueprint $table){
            $table->increments('id_transaksi');
            $table->string('kode_transaksi')->unique();
            $table->string('kode_barang', 15);
            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('tbl_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->string('bukti_nota', 1999);
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
        Schema::dropIfExists('tbl_transaksibarang');
    }
}
