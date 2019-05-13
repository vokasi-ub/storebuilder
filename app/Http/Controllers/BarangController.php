<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangModel;
use App\KategoriModel;
use App\SupplierModel;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Exports\BarangExport;

use App\Imports\BarangImport;

use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
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
        return view('dashboard.databarang');
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
        'kode_barang' => 'required|string|max:255',
        'kode_kategori' => 'required|string|max:255|',
        'kode_supplier' => 'required|string|max:255|',
        'foto_barang' => 'required|image|max:2048',
        'nama_barang' => 'required|string|max:255|',
        'stok_barang' => 'required|integer|',
        'satuan_barang' => 'required|string|max:255|',
        'harga_barang' => 'required|integer|'

        
        
    ]);
    
    $input = $request->all();
    $input['foto_barang'] = null;
    if ($request->hasFile('foto_barang')){
        $input['foto_barang'] = '/upload/image/'.str_slug($input['nama_barang'], '-').'.'.$request->foto_barang->getClientOriginalExtension();
        $request->foto_barang->move(public_path('/upload/image/'), $input['foto_barang']);
    }
    BarangModel::create($input);
    return response()->json([
        'success' => true,
        'message' => 'Contact Created'
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        $model = BarangModel::findOrFail($id_barang);
        return view('dashboard.show_barang', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        $model = BarangModel::findOrFail($id_barang);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        $this->validate($request, [
            'kode_barang' => 'required|string|max:255',
            'kode_kategori' => 'required|string|max:255|',
            'kode_supplier' => 'required|string|max:255|',
            'nama_barang' => 'required|string|max:255|',
            'stok_barang' => 'required|integer|',
            'satuan_barang' => 'required|string|max:255|',
            'harga_barang' => 'required|integer|'
    
            
            
        ]);
        
        $input = $request->all();
        $model = BarangModel::findOrFail($id_barang);
        $input['foto_barang'] = $model->foto_barang;
        if ($request->hasFile('foto_barang')){
            if (!$model->foto_barang == NULL){
                unlink(public_path($model->foto_barang));
            }
            $input['foto_barang'] = '/upload/image/'.str_slug($input['nama_barang'], '-').'.'.$request->foto_barang->getClientOriginalExtension();
            $request->foto_barang->move(public_path('/upload/image/'), $input['foto_barang']);
        }
        $model->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Contact Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        $model = BarangModel::findOrFail($id_barang);
        if (!$model->foto_barang == NULL){
            unlink(public_path($model->foto_barang));
        }
        BarangModel::destroy($id_barang);
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }

    public function dataTable()
    {
        $model = BarangModel::query();
        return DataTables::of($model)
        ->addColumn('show_image', function($model){
            if ($model->foto_barang == NULL){
                return 'No Image';
            }
            return '<img class="rounded-square" width="70" height="70" src="'. url($model->foto_barang) .'" alt="">';
        })

        
        
        ->addColumn('action', function($model){
            return '<a href="{{ $url_show }}" class="btn"><i class="ace-icon fa fa-eye bigger-120"></i></a> ' .
                   '<a onclick="editForm('. $model->id_barang .')" class="btn"><i class="ace-icon fa fa-pencil bigger-120"></i> </a> ' .
                   '<a onclick="deleteData('. $model->id_barang .')" class="btn"><i class="ace-icon fa fa-trash-o bigger-120"> </a>';
        })
        
            ->rawColumns(['show_image','action'])->make(true);
    }

    public function importExportView()

    {

       return view('import');

    }

    public function export() 

    {

        return Excel::download(new BarangExport, 'barang.xlsx');

    }

    public function import() 

    {

        Excel::import(new BarangImport,request()->file('file'));

           

        return back();

    }

   
}


