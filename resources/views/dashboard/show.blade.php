<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>ID Supllier</th>  
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Deskripsi Supplier</th>
            <th>Dibuat pada</th>
            <th>Diperbarui pada</th>
            
	    </tr>
	</thead>
        <tbody>
        <td>{{ $model->id_supplier }}</td>
        <td>{{ $model->kode_supplier }}</td>
        <td>{{ $model->nama_supplier }}</td>
        <td>{{ $model->alamat_supplier }}</td>
        <td>{{ $model->deskripsi_supplier }}</td>
        <td>{{ $model->created_at }}</td>
        <td>{{ $model->updated_at }}</td>
        </tbody>
</table>