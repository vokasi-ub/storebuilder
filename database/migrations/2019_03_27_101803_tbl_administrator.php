<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblAdministrator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_administrator', function (Blueprint $table){
            $table->increments('id_administrator');
            $table->string('nama_administrator', 50);
            $table->string('jeniskelamin_administrator',20);
            $table->string('tempatlahir_administrator',10);
            $table->date('tanggallahir_administrator');
            $table->text('alamat_administrator');
            $table->string('username_administrator',50);
            $table->string('password_administrator',50);
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
        Schema::dropIfExists('tbl_administrator');
    }
}
