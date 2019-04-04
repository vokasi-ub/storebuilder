<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table= "tbl_barang";
    protected $primaryKey="kode_barang";
    protected $fillable=['kode_kategori','kode_supplier','foto_barang','nama_barang','stok_barang','satuan_barang','harga_barang'];
}
