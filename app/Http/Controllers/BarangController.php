<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangModel;
use DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.databarang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new BarangModel();
        return view('dashboard.form_barang', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $this->validate($request, [
        'kode_barang' => 'required|string|max:255',
        'kode_kategori' => 'required|string|max:255|',
        'kode_supplier' => 'required|string|max:255|',
        'foto_barang' => 'image|nullable|max:1999',
        'nama_barang' => 'required|string|max:255|',
        'stok_barang' => 'required|integer|',
        'satuan_barang' => 'required|string|max:255|',
        'harga_barang' => 'required|integer|'
        
    ]);

    $model = BarangModel::create($request->all());
    return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_barang)
    {
        $model = BarangModel::findOrFail($kode_barang);
        return view('dashboard.show_barang', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang)
    {
        $model = BarangModel::findOrFail($kode_barang);
        return view('dashboard.form_barang', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
        $this->validate($request, [
            'kode_barang' => 'required|string|max:255',
            'kode_kategori' => 'required|string|max:255|',
            'kode_supplier' => 'required|string|max:255|',
            'foto_barang' => 'image|nullable|max:1999',
            'nama_barang' => 'required|string|max:255|',
            'stok_barang' => 'required|integer|',
            'satuan_barang' => 'required|string|max:255|',
            'harga_barang' => 'required|integer|'
            
        ]);

        $model = BarangModel::findOrFail($kode_barang);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
        $model = BarangModel::findOrFail($kode_barang);
        $model->delete(); 
    }

    public function dataTable()
    {
        $model = BarangModel::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action_barang', [
                    'model' => $model,
                    'url_show' => route('barang.show', $model->kode_barang),
                    'url_edit' => route('barang.edit', $model->kode_barang),
                    'url_destroy' => route('barang.destroy', $model->kode_barang)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
