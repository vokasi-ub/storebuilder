<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SupplaiModel;

use DataTables;

class SupplaiController extends Controller
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
        return view('dashboard.datasupplai');
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
            'kode_supplai' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|',
            'jumlah_barang' => 'required|integer|',
            'total_harga' => 'required|integer|',
            'bukti_nota' => 'required|image|max:2048'
            
        ]);
        
        $input = $request->all();
        $input['bukti_nota'] = null;
        if ($request->hasFile('bukti_nota')){
            $input['bukti_nota'] = '/upload/image/nota/'.str_slug($input['kode_supplai'], '-').'.'.$request->bukti_nota->getClientOriginalExtension();
            $request->bukti_nota->move(public_path('/upload/image/nota/'), $input['bukti_nota']);
        }
        SupplaiModel::create($input);
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
    public function show($id_supplai)
    {
        $model = SupplaiModel::findOrFail($id_supplai);
        return view('dashboard.show_supplai', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_supplai)
    {
        $model = SupplaiModel::findOrFail($id_supplai);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_supplai)
    {
        $this->validate($request, [
            'kode_supplai' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|',
            'jumlah_barang' => 'required|integer|',
            'total_harga' => 'required|integer|',
            'bukti_nota' => 'required|image|max:2048'
    
            
            
        ]);
        
        $input = $request->all();
        $model = SupplaiModel::findOrFail($id_supplai);
        $input['bukti_nota'] = $model->bukti_nota;
        if ($request->hasFile('bukti_nota')){
            if (!$model->bukti_nota == NULL){
                unlink(public_path($model->bukti_nota));
            }
            $input['bukti_nota'] = '/upload/image/nota/'.str_slug($input['kode_supplai'], '-').'.'.$request->bukti_nota->getClientOriginalExtension();
            $request->bukti_nota->move(public_path('/upload/image/nota/'), $input['bukti_nota']);
        }
        $model->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Supplai Barang Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplai)
    {
        $model = SupplaiModel::findOrFail($id_supplai);
        if (!$model->bukti_nota == NULL){
            unlink(public_path($model->bukti_nota));
        }
        SupplaiModel::destroy($id_supplai);
        return response()->json([
            'success' => true,
            'message' => 'Supplai Barang Deleted'
        ]);
    }

    public function dataTable()
    {
        $model = SupplaiModel::query();
        return DataTables::of($model)
        ->addColumn('show_image', function($model){
            if ($model->bukti_nota == NULL){
                return 'No Image';
            }
            return '<img class="rounded-square" width="70" height="70" src="'. url($model->bukti_nota) .'" alt="">';
        })
        ->addColumn('action', function($model){
            return '<a href="" class="btn"><i class="ace-icon fa fa-eye bigger-120"></i></a> ' .
                   '<a onclick="editForm('. $model->id_supplai .')" class="btn"><i class="ace-icon fa fa-pencil bigger-120"></i> </a> ' .
                   '<a onclick="deleteData('. $model->id_supplai .')" class="btn"><i class="ace-icon fa fa-trash-o bigger-120"> </a>';
        })
        
            ->rawColumns(['show_image','action'])->make(true);
    }
}
