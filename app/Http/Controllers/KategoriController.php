<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriModel;
use DataTables;

class KategoriController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.datakategori');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new KategoriModel();
        return view('dashboard.form_kategori', compact('model'));
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
        'kode_kategori' => 'required|string|max:255',
        'nama_kategori' => 'required|string|max:255|',
        'deskripsi_kategori' => 'required|string|max:255|'
        
    ]);

    $model = KategoriModel::create($request->all());
    return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        $model = KategoriModel::findOrFail($id_kategori);
        return view('dashboard.show_kategori', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $model = KategoriModel::findOrFail($id_kategori);
        return view('dashboard.form_kategori', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $this->validate($request, [
            'kode_kategori' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255|',
            'deskripsi_kategori' => 'required|string|max:255|'
        ]);
        $model = KategoriModel::findOrFail($id_kategori);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $model = KategoriModel::findOrFail($id_kategori);
        $model->delete();
    }

    public function dataTable()
    {
        $model = KategoriModel::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action_kategori', [
                    'model' => $model,
                    'url_show' => route('kategoribarang.show', $model->id_kategori),
                    'url_edit' => route('kategoribarang.edit', $model->id_kategori),
                    'url_destroy' => route('kategoribarang.destroy', $model->id_kategori)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    
}
