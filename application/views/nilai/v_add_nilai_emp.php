<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Input Nilai</h3>
				</div>
				<?php echo form_open_multipart("nilai/store_nilai"); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Tahun Ajaran</label>
								<input class="form-control" readonly type="text" value="<?= $nim?>" name="nim">
                                <input class="form-control" readonly type="hidden" value="<?= $id_matkul?>" name="id_matkul">
                                <input class="form-control" readonly type="hidden" value="<?= $id_jadwal?>" name="id_jadwal">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
                            <div class="col-xs-6">
								<label>Grade</label>
								<input class="form-control" type="text" name="nilai" style="text-transform:uppercase" maxlength='1'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
                            <div class="col-xs-6">
								<label>Catatan</label>
								<input class="form-control" type="text" name="catatan" style="text-transform:uppercase">
							</div>
						</div>
					</div>
					<div class="box-footer">
                        <a class="btn btn-danger" href="<?php echo base_url('/nilai')?>"><span>Back</span></a>
						<button type="submit" class="btn btn-warning">Edit</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>