<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierModel;
use DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.datasupplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new SupplierModel();
        return view('dashboard.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_supplier' => 'required|string|max:255',
            'nama_supplier' => 'required|string|max:255|',
            'alamat_supplier' => 'required|string|max:255|',
            'deskripsi_supplier' => 'required|string|max:255|'
            
        ]);

        $model = SupplierModel::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_supplier)
    {
        $model = SupplierModel::findOrFail($id_supplier);
        return view('dashboard.show', compact('model'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_supplier)
    {
        $model = SupplierModel::findOrFail($id_supplier);
        return view('dashboard.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_supplier)
    {
        $this->validate($request, [
            'kode_supplier' => 'required|string|max:255',
            'nama_supplier' => 'required|string|max:255|',
            'alamat_supplier' => 'required|string|max:255|',
            'deskripsi_supplier' => 'required|string|max:255|'
        ]);
        $model = SupplierModel::findOrFail($id_supplier);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplier)
    {
        
        $model = SupplierModel::findOrFail($id_supplier);
        $model->delete();
        // User::destroy($id);
    }

    public function dataTable()
    {
        $model = SupplierModel::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('supplierbarang.show', $model->id_supplier),
                    'url_edit' => route('supplierbarang.edit', $model->id_supplier),
                    'url_destroy' => route('supplierbarang.destroy', $model->id_supplier)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
