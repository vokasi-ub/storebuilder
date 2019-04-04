<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>ID Supllier</th>  
            <th>Kode kategori</th>
            <th>Nama kategori</th>
            <th>Deskripsi kategori</th>
            <th>Dibuat pada</th>
            <th>Diperbarui pada</th>
            
	    </tr>
	</thead>
        <tbody>
        <td>{{ $model->id_kategori }}</td>
        <td>{{ $model->kode_kategori }}</td>
        <td>{{ $model->nama_kategori }}</td>
        <td>{{ $model->deskripsi_kategori }}</td>
        <td>{{ $model->created_at }}</td>
        <td>{{ $model->updated_at }}</td>
        </tbody>
</table>