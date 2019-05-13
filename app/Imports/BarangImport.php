<?php

namespace App\Imports;

use App\BarangModel;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BarangModel([
            'id_barang'     => $row[0],

            'kode_barang'    => $row[1], 

            'kode_kategori' => $row[2],
            
            'kode_supplier' => $row[2],
            
            'foto_barang' => $row[3],

            'nama_barang' => $row[4],

            'stok_barang' => $row[5],

            'satuan_barang' => $row[6],

            'harga_barang' => $row[7],
        ]);
    }
}
