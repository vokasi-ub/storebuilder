<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-barang" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_barang" name="id_barang">
                    
                    <div class="form-group">
                        <label for="kode_barang" class="col-md-3 control-label">Kode Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="kode_barang" name="kode_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="kode_kategori" class="col-md-3 control-label">Kode Kategori</label>
                        <div class="col-md-6">
                        {!! Form::select('kode_kategori',  $kategoriarray, null, ['class'=>'form-control','placeholder'=>'Pilih Kategori','id'=>'kode_kategori', 'name'=>'kode_kategori']) !!}
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label for="kode_supplier" class="col-md-3 control-label">Kode Supplier</label>
                        <div class="col-md-6">
                        {!! Form::select('kode_supplier',  $supplierarray, null, ['class'=>'form-control','placeholder'=>'Pilih Supplier','id'=>'kode_supplier', 'name'=>'kode_supplier']) !!}
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="col-md-3 control-label">Foto Barang</label>
                        <div class="col-md-6">
                            <input type="file" id="foto_barang" name="foto_barang" value="foto_barang">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                

                    <div class="form-group">
                        <label for="Nama_barang" class="col-md-3 control-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stok_barang" class="col-md-3 control-label">Stok Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="stok_barang" name="stok_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="satuan_barang" class="col-md-3 control-label">Satuan Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="satuan_barang" name="satuan_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga_barang" class="col-md-3 control-label">Harga Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="harga_barang" name="harga_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>


               
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>