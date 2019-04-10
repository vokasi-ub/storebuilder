<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSupplaibarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplaibarang', function (Blueprint $table){
            $table->increments('id_supplai');
            $table->string('kode_supplai')->unique();
            $table->string('kode_barang', 15);
            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('tbl_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
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
        Schema::dropIfExists('tbl_supplaibarang');
    }
}
