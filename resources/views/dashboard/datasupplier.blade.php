@extends('layouts.master')
@section('datasupplier')

<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Data Supplier Barang</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a href="{{ route('supplierbarang.create') }}" class="btn btn-blue modal-show"  title="Tambah Data Supplier"><i class="icon-plus"></i> Tambah Data Supplier</a>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th>NO</th>  
                    <th>Kode Supplier</th>
                    <th class="hidden-phone">Nama Supplier</th>
                    <th class="hidden-phone">Alamat Supplier</th>
                    <th class="hidden-phone">Deskripsi Supplier</th>
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
                {data: 'action', name: 'action'}
            ]
        });
        
    </script>
@endpush


