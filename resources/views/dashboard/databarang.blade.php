@extends('layouts.master')
@section('datakategori')

<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Data Barang</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a href="{{ route('barang.create') }}" class="btn btn-blue modal-show"  title="Tambah Data Barang"><i class="icon-plus"></i> Tambah Data Barang</a>
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
 
@endsection

@push('scripts')
    <script>
        $('#datatable').DataTable({
			      responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('tabel.barang') }}",
            columns: [
                {data: 'kode_barang', name: 'kode_barang'},
                {data: 'kode_kategori', name: 'kode_kategori'},
                {data: 'kode_supplier', name: 'kode_supplier'},
                {data: 'foto_barang', name: 'foto_barang'},
                {data: 'nama_barang', name: 'nama_barang'},
                {data: 'stok_barang', name: 'stok_barang'},
                {data: 'satuan_barang', name: 'satuan_barang'},
                {data: 'harga_barang', name: 'harga_barang'},
                {data: 'action', name: 'action'}
            ]
        });
        
    </script>
@endpush


