<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SupplierModel;

class DropdownSupplier extends ServiceProvider
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
            $view->with('supplierarray', SupplierModel::all('nama_supplier'));       
         });
    }
}
