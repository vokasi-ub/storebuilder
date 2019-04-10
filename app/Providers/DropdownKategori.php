<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\KategoriModel;

class DropdownKategori extends ServiceProvider
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
            $view->with('kategoriarray', KategoriModel::pluck('nama_kategori','kode_kategori'));       
         });
    }
}
