<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplaiModel extends Model
{
    protected $table= "tbl_supplaibarang";
    protected $primaryKey="id_supplai";
    protected $fillable=['id_supplai','kode_supplai','kode_barang','jumlah_barang','total_harga','bukti_nota'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class);
    }
}
