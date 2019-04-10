{!! Form::model($model, [
    'route' => $model->exists ? ['supplierbarang.update', $model->id_supplier] : 'supplierbarang.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Kode Supplier</label>
        {!! Form::text('kode_supplier', null, ['class' => 'form-control', 'id' => 'kode_supplier']) !!}
    </div>
    
    <div class="form-group">
        <label for="" class="control-label">Nama Supplier</label>
        {!! Form::text('nama_supplier', null, ['class' => 'form-control', 'id' => 'nama_supplier']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Alamat Supplier</label>
        {!! Form::text('alamat_supplier', null, ['class' => 'form-control', 'id' => 'alamat_supplier']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Deskripsi Supplier</label>
        {!! Form::text('deskripsi_supplier', null, ['class' => 'form-control', 'id' => 'deskripsi_supplier']) !!}
    </div>

{!! Form::close() !!}