<?php

namespace App\Exports;

use App\BarangModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\KategoriModel;
class BarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $barang = BarangModel::with(['kategori','supplier'])->get();
       
    

        return $barang;
    }
}
