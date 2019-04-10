@extends('layouts.master')
@section('datakategori')

<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Data Barang</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a onclick="addForm()" class="btn btn-primary pull-left" style="margin-left: 8px; margin-top: 8px; margin-bottom: 8px;">Add Barang</a>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th>Kode Barang</th>  
                    <th>Kode Kategori</th>
                    <th class="hidden-phone">Kode Supplier</th>
                    <th class="hidden-phone">Foto Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Stok Barang</th>
                    <th class="hidden-phone">Satuan Barang</th>
                    <th class="hidden-phone">Harga Barang</th>
                    <th class="hidden-phone"> Action </th>
                </tr>
                </thead>
                <tbody>
                  
                  </tbody>
              </table>
            </div>
          </div>
        </div>
</section>

@include('dashboard.form_barang')
 
@endsection

@push('scripts')
    <script>
        var table   =$('#datatable').DataTable({
			      responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('tabel.barang') }}",
            columns: [    
                {data: 'kode_barang', name: 'kode_barang'},
                {data: 'kode_kategori', name: 'kode_kategori'},
                {data: 'kode_supplier', name: 'kode_supplier'},
                {data: 'show_image', name: 'show_image'},
                {data: 'nama_barang', name: 'nama_barang'},
                {data: 'stok_barang', name: 'stok_barang'},
                {data: 'satuan_barang', name: 'satuan_barang'},
                {data: 'harga_barang', name: 'harga_barang'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Barang');
      }
      function editForm(id_barang) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('barang') }}" + '/' + id_barang + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Barang');
            
            $('#id_barang').val(data.id_barang);
            $('#kode_barang').val(data.kode_barang);
            $('#kode_kategori').val(data.kode_kategori);
            $('#kode_supplier').val(data.kode_supplier);
            $('#show_image').val(data.show_image);
            $('#nama_barang').val(data.nama_barang);
            $('#stok_barang').val(data.stok_barang);
            $('#satuan_barang').val(data.satuan_barang);
            $('#harga_barang').val(data.harga_barang);

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }
      function deleteData(id_barang){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Apakah anda yakin menghapus data ini?',
              text: "Data tidak akan bisa dikembalikan setelah dihapus",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('barang') }}" + '/' + id_barang,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }
      $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id_barang = $('#id_barang').val();
                    if (save_method == 'add') url = "{{ url('barang') }}";
                    else url = "{{ url('barang') . '/' }}" + id_barang;
                    $.ajax({
                        url : url,
                        type : "POST",
//                        data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
        
    </script>
@endpush



