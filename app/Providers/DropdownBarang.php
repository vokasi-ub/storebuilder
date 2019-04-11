<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BarangModel;

class DropdownBarang extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){            
            $view->with('barangarray', BarangModel::pluck('nama_barang','kode_barang'));       
         });
    }
}
