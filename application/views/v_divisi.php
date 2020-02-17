<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo ucfirst($this->uri->segment(1)) ?> List</h3>
            </div>
        	&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("divisi/add"); ?>" type="submit" class="btn btn-info btn-sm">Add Division</a><br><br>
        	<div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
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