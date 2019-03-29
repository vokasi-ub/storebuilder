<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSupplierbarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplierbarang', function (Blueprint $table){
            $table->increments('id_supplier');
            $table->string('kode_supplier', 15);
            $table->string('nama_supplier', 50);
            $table->text('alamat_supplier');
            $table->text('deskripsi_supplier');
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
        Schema::dropIfExists('tbl_supplierbarang');
    }
}
