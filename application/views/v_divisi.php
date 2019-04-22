<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        	<a href="<?php echo base_url("divisi/add"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Divisi</a><br><br>
        	<div class="card">
			    <div class="card-body">
			        <h5 class="card-title">Daftar Divisi</h5>
			        <div class="table-responsive">
			            <table id="zero_config" class="table">
			                <thead>
			                    <tr>
			                        <th width="60%">Kategori</th>
			                        <th width="20%">Action</th>
			                    </tr>
			                </thead>
			                <tbody>
												<?php foreach ($div as $d) { ?>
													<tr>
														<td><?php echo $d->nama_div;?></td>
														<td>
															<a href="<?php echo base_url().'divisi/edit/'.$d->no_div;?>" class="btn btn-info btn-sm">Edit</a>
															<a href="<?php echo base_url().'divisi/delete/'.$d->no_div;?>" class="btn btn-danger btn-sm">Hapus</a>
														</td>
													</tr>
												<?php } ?>
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>