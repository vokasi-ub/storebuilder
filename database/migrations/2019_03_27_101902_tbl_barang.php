<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barang', function (Blueprint $table){
            $table->string('kode_barang', 15)->primary();
            $table->string('kode_kategori',15);
            $table->string('kode_supplier',15);
            $table->string('foto_barang', 15);
            $table->string('nama_barang',50);
            $table->integer('stok_barang');
            $table->string('satuan_barang',10);
            $table->integer('harga_barang');
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
        Schema::dropIfExists('tbl_barang');
    }
}
