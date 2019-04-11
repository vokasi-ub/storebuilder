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
                    <input type="hidden" id="id_transaksi" name="id_transaksi">
                    
                    <div class="form-group">
                        <label for="kode_transaksi" class="col-md-3 control-label">Kode Transaksi</label>
                        <div class="col-md-6">
                            <input type="text" id="kode_transaksi" name="kode_transaksi" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="kode_barang" class="col-md-3 control-label">Kode Barang</label>
                        <div class="col-md-6">
                        {!! Form::select('kode_barang',  $barangarray, null, ['class'=>'form-control','placeholder'=>'Pilih Barang','id'=>'kode_barang', 'name'=>'kode_barang']) !!}
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>

                    
                    <div class="form-group">
                        <label for="jumlah_barang" class="col-md-3 control-label">Jumlah Barang</label>
                        <div class="col-md-6">
                            <input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total_harga" class="col-md-3 control-label">Total Harga</label>
                        <div class="col-md-6">
                            <input type="text" id="total_harga" name="total_harga" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nota" class="col-md-3 control-label">Bukti Nota</label>
                        <div class="col-md-6">
                            <input type="file" id="bukti_nota" name="bukti_nota" value="bukti_nota">
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