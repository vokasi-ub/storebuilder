@extends('layouts.master')
@section('datakategori')

<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Data Kategori Barang</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <a href="{{ route('kategoribarang.create') }}" class="btn btn-blue modal-show"  title="Tambah Data Kategori"><i class="icon-plus"></i> Tambah Data Kategori</a>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th>NO</th>  
                    <th>Kode Kategori</th>
                    <th class="hidden-phone">Nama Kategori</th>
                    <th class="hidden-phone">Deskripsi Kategori</th>
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
            ajax: "{{ route('tabel.kategoribarang') }}",
            columns: [
                {data: 'id_kategori', name: 'id_kategori'},
                {data: 'kode_kategori', name: 'kode_kategori'},
                {data: 'nama_kategori', name: 'nama_kategori'},
                {data: 'deskripsi_kategori', name: 'deskripsi_kategori'},
                {data: 'action', name: 'action'}
            ]
        });
        
    </script>
@endpush


