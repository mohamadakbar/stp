<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo ucfirst($this->uri->segment(1)) ?></h3>
            </div>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("kategori/add"); ?>" type="submit" class="btn btn-info btn-sm">Add Category</a><br><br>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
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