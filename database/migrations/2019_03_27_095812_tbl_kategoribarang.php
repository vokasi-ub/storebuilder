<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblKategoribarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kategoribarang', function (Blueprint $table){
            $table->increments('id_kategori');
            $table->string('kode_kategori', 15);
            $table->string('nama_kategori', 50);
            $table->text('deskripsi_kategori');
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
        Schema::dropIfExists('tbl_kategoribarang');
    }
}
