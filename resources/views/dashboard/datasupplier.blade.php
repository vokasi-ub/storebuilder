@extends('layouts.master')
@section('datasupplier')

<div class="main-inner">
    <div class="container">
      <div class="row">
            <div class="widget-content widget-table action-table">
                <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Data Kategori</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table style="width:100%" id="datatable" class="table table-striped table-bordered"  >
                <thead>
                    <tr>
                    <th>NO</th>  
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Deskripsi Supplier</th>
                    <th>Dibuat pada</th>
                    <th>Diperbarui pada</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
              
                 
              
                                  
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('tabel.supplierbarang') }}",
            columns: [
                {data: 'id_supplier', name: 'id_supplier'},
                {data: 'kode_supplier', name: 'kode_supplier'},
                {data: 'nama_supplier', name: 'nama_supplier'},
                {data: 'alamat_supplier', name: 'alamat_supplier'},
                {data: 'deskripsi_supplier', name: 'deskripsi_supplier'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush