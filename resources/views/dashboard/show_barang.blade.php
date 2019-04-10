<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>Kode Barang</th>  
            <th>Kode Kategori</th>
            <th>Kode Supplier</th>
            <th>Foto Barang</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Satuan Barang</th>
            <th>Harga Barang</th>
            <th>Dibuat pada</th>
            <th>Diperbarui pada</th>
            
	    </tr>
	</thead>
        <tbody>
        <td>{{ $model->kode_barang }}</td>
        <td>{{ $model->kode_kategori }}</td>
        <td>{{ $model->kode_supplier }}</td>
        <td>{{ $model->foto_barang }}</td>
        <td>{{ $model->nama_barang }}</td>
        <td>{{ $model->stok_barang }}</td>
        <td>{{ $model->satuan_barang }}</td>
        <td>{{ $model->harga_barang }}</td>
        <td>{{ $model->created_at }}</td>
        <td>{{ $model->updated_at }}</td>
        </tbody>
</table>