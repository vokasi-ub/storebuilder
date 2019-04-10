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
            $table->increments('id_barang');
            $table->string('kode_barang', 15)->unique();
            $table->string('kode_kategori');
            $table->foreign('kode_kategori')
            ->references('kode_kategori')
            ->on('tbl_kategoribarang');
            $table->string('kode_supplier');
            $table->foreign('kode_supplier')
            ->references('kode_supplier')
            ->on('tbl_supplierbarang');
            $table->string('foto_barang', 1999);
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
