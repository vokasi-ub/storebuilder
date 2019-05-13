<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiModel;
use DataTables;
use Excel;


class TransaksiController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        $transaksi = TransaksiModel::get();
        return view('dashboard.datatransaksi', compact('transaksi'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datatransaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kode_transaksi' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|',
            'jumlah_barang' => 'required|integer|',
            'total_harga' => 'required|integer|',
            'bukti_nota' => 'required|image|max:2048'
            
        ]);
        
        $input = $request->all();
        $input['bukti_nota'] = null;
        if ($request->hasFile('bukti_nota')){
            $input['bukti_nota'] = '/upload/image/nota/'.str_slug($input['kode_transaksi'], '-').'.'.$request->bukti_nota->getClientOriginalExtension();
            $request->bukti_nota->move(public_path('/upload/image/nota/'), $input['bukti_nota']);
        }
        TransaksiModel::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Supplai Barang Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_transaksi)
    {
        $model = TransaksiModel::findOrFail($id_transaksi);
        return $model;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $model = TransaksiModel::findOrFail($id_transaksi);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|',
            'jumlah_barang' => 'required|integer|',
            'total_harga' => 'required|integer|',
            'bukti_nota' => 'required|image|max:2048'
    
            
            
        ]);
        
        $input = $request->all();
        $model = TransaksiModel::findOrFail($id_transaksi);
        $input['bukti_nota'] = $model->bukti_nota;
        if ($request->hasFile('bukti_nota')){
            if (!$model->bukti_nota == NULL){
                unlink(public_path($model->bukti_nota));
            }
            $input['bukti_nota'] = '/upload/image/nota/'.str_slug($input['kode_transaksi'], '-').'.'.$request->bukti_nota->getClientOriginalExtension();
            $request->bukti_nota->move(public_path('/upload/image/nota/'), $input['bukti_nota']);
        }
        $model->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Transaksi Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        $model = TransaksiModel::findOrFail($id_transaksi);
        if (!$model->bukti_nota == NULL){
            unlink(public_path($model->bukti_nota));
        }
        TransaksiModel::destroy($id_transaksi);
        return response()->json([
            'success' => true,
            'message' => 'Transaksi Deleted'
        ]);
    }

    public function dataTable()
    {
        $model = TransaksiModel::query();
        return DataTables::of($model)
        ->addColumn('show_image', function($model){
            if ($model->bukti_nota == NULL){
                return 'No Image';
            }
            return '<img class="rounded-square" width="70" height="70" src="'. url($model->bukti_nota) .'" alt="">';
        })
        ->addColumn('action', function($model){
            return '<a href="#" class="btn"><i class="ace-icon fa fa-eye bigger-120"></i></a> ' .
                   '<a onclick="editForm('. $model->id_transaksi .')" class="btn"><i class="ace-icon fa fa-pencil bigger-120"></i> </a> ' .
                   '<a onclick="deleteData('. $model->id_transaksi .')" class="btn"><i class="ace-icon fa fa-trash-o bigger-120"> </a>';
        })
        
            ->rawColumns(['show_image','action'])->make(true);
    }
}
