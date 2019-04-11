{!! Form::model($model, [
    'route' => $model->exists ? ['kategoribarang.update', $model->id_kategori] : 'kategoribarang.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Kode Kategori</label>
        {!! Form::text('kode_kategori', null, ['class' => 'form-control', 'id' => 'kode_kategori']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Nama Kategori</label>
        {!! Form::text('nama_kategori', null, ['class' => 'form-control', 'id' => 'nama_kategori']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Deskripsi Kategori</label>
        {!! Form::textarea('deskripsi_kategori', null, ['class' => 'form-control', 'id' => 'deskripsi_kategori']) !!}
    </div>

{!! Form::close() !!}