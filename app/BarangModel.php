<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table= "tbl_barang";
    protected $primaryKey="id_barang";
    protected $fillable=['id_barang','kode_barang','kode_kategori','kode_supplier','foto_barang','nama_barang','stok_barang','satuan_barang','harga_barang'];
    
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori','kode_kategori');
    }

    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'id_supplier','kode_supplier');
    }
   
}
