<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table= "tbl_transaksibarang";
    protected $primaryKey="id_transaksi";
    protected $fillable=['id_transaksi','kode_transaksi','kode_barang','jumlah_barang','total_harga','bukti_nota'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class);
    }
}
