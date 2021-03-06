<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        	<a href="<?php echo base_url("kategori/add"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Kategori</a><br><br>
        	<div class="card">
			    <div class="card-body">
			        <h5 class="card-title">Daftar Kategori</h5>
			        <div class="table-responsive">
			            <table id="zero_config" class="table">
			                <thead>
			                    <tr>
			                        <th width="60%">Kategori</th>
			                        <th width="20%">Action</th>
			                    </tr>
			                </thead>
			                <tbody>
												<?php foreach ($kat as $k) { ?>
													<tr>
														<td><?php echo $k->nama_kat;?></td>
														<td>
															<a href="<?php echo base_url().'kategori/edit/'.$k->no_kat;?>" class="btn btn-info btn-sm">Edit</a>
															<a href="<?php echo base_url().'kategori/delete/'.$k->no_kat;?>" class="btn btn-danger btn-sm">Hapus</a>
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