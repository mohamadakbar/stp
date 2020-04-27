<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Input Nilai</h3>
				</div>
				<?php echo form_open_multipart("nilai/edit_nilai"); ?>
				<?php foreach ($nilai as $n) {
                ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>NIM</label>
								<input class="form-control" readonly type="text" value="<?= $n->nim?>">
								<input class="form-control" readonly type="hidden" value="<?= $n->id_matkul?>">
								<input class="form-control" readonly type="hidden" value="<?= $n->id_jadwal?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Nilai</label>
								<input class="form-control" readonly type="text" value="<?php echo $n->nilai?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Catatan</label>
								<input class="form-control" readonly type="text" value="<?php echo $n->catatan?>"
									name="catatan">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a class="btn btn-danger" href="<?php echo base_url('/nilai')?>"><span>Back</span></a>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit</button>
					</div>
				</div>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Nilai</h4>
							</div>
							<div class="modal-body">
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title">Edit Nilai</h3>
									</div>
									<form role="form">
										<div class="box-body">
											<div class="form-group">
												<label for="exampleInputEmail1">NIM</label>
                                                <input class="form-control" readonly type="text" value="<?= $n->nim?>" name="nim">
                                                <input class="form-control" readonly type="hidden" value="<?= $n->id_matkul?>" name="id_matkul">
                                                <input class="form-control" readonly type="hidden" value="<?= $n->id_jadwal?>" name="id_jadwal">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Grade</label>
												<input class="form-control" type="text" value="<?php echo $n->nilai?>" name="nilai" style="text-transform:uppercase" maxlength='1'>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Catatan</label>
												<input class="form-control" type="text" value="<?php echo $n->catatan?>" name="catatan" style="text-transform:uppercase">
											</div>
											<!-- <div class="form-group">
												<label for="exampleInputFile">File input</label>
												<input type="file" id="exampleInputFile">
												<p class="help-block">Example block-level help text here.</p>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox"> Check me out
												</label>
											</div> -->
										</div>
									</form>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
                </div>
                <?php } ?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
