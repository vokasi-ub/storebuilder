{!! Form::model($model, [
    'route' => $model->exists ? ['barang.update', $model->kode_supplier] : 'barang.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Kode Barang</label>
        {!! Form::text('kode_barang', null, ['class' => 'form-control', 'id' => 'kode_barang']) !!}
    </div>
    
    <div class="form-group">
         <label for="" class="control-label">Kode Kategori</label>                                      
         {!! Form::select('nama_kategori',  $kategoriarray, null, ['class' => 'form-control']) !!}      
    </div>

    <div class="form-group">
         <label for="" class="control-label">Kode Supplier</label>                                      
         {!! Form::select('nama_supplier',  $supplierarray, null, ['class' => 'form-control']) !!}      
    </div>

    <div class="form-group">
        <label for="" class="control-label">Foto Barang</label>
        {!! Form::file('foto_barang') !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Nama Barang</label>
        {!! Form::text('nama_barang', null, ['class' => 'form-control', 'id' => 'nama_barang']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Stok Barang</label>
        {!! Form::text('stok_barang', null, ['class' => 'form-control', 'id' => 'stok_barang']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Satuan Barang</label>
        {!! Form::text('satuan_barang', null, ['class' => 'form-control', 'id' => 'satuan_barang']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Harga Barang</label>
        {!! Form::text('harga_barang', null, ['class' => 'form-control', 'id' => 'harga_barang']) !!}
    </div>

{!! Form::close() !!}