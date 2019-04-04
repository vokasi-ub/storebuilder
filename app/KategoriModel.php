<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table= "tbl_kategoribarang";
    protected $primaryKey="id_kategori";
    protected $fillable=['kode_kategori','nama_kategori','deskripsi_kategori'];
}
