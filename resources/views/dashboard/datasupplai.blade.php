@extends('layouts.master')
@section('datasupplai')

<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Data Supplai Barang</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a onclick="addForm()" class="btn btn-primary pull-left" style="margin-left: 8px; margin-top: 8px; margin-bottom: 8px;">Tambah Supplai Barang</a>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th>NO</th>  
                    <th>Kode Supplai</th>
                    <th class="hidden-phone">Kode Barang</th>
                    <th class="hidden-phone">Jumlah Barang</th>
                    <th class="hidden-phone">Total Harga</th>
                    <th class="hidden-phone">Bukti Nota</th>
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

@include('dashboard.form_supplai')
 
@endsection

@push('scripts')
    <script>
var table =$('#datatable').DataTable({
			responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('tabel.supplaibarang') }}",
            columns: [    
                {data: 'id_supplai', name: 'id_supplai'},
                {data: 'kode_supplai', name: 'kode_supplai'},
                {data: 'kode_barang', name: 'kode_barang'},
                {data: 'jumlah_barang', name: 'jumlah_barang'},
                {data: 'total_harga', name: 'total_harga'},
                {data: 'show_image', name: 'show_image'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Supplai Barang');
      }
      function editForm(id_supplai) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('supplaibarang') }}" + '/' + id_supplai + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Barang');
            
            $('#id_supplai').val(data.id_supplai);
            $('#kode_supplai').val(data.kode_supplai);
            $('#kode_barang').val(data.kode_barang);
            $('#jumlah_barang').val(data.jumlah_barang);
            $('#total_harga').val(data.total_harga);
            $('#show_image').val(data.show_image);

          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }
      function deleteData(id_supplai){
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
                  url : "{{ url('supplaibarang') }}" + '/' + id_supplai,
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
                    var id_supplai = $('#id_supplai').val();
                    if (save_method == 'add') url = "{{ url('supplaibarang') }}";
                    else url = "{{ url('supplaibarang') . '/' }}" + id_supplai;
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



