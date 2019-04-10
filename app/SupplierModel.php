<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table= "tbl_supplierbarang";
    protected $primaryKey="id_supplier";
    protected $fillable=['id_supplier','kode_supplier','nama_supplier','alamat_supplier','deskripsi_supplier'];

    public function barang()
    {
        return $this->hasOne(BarangModel::class);
    }
}
