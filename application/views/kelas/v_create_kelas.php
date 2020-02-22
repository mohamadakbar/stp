<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Kelas</h3>
				</div>
				<?php echo form_open_multipart("kelas/store"); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">No Ruangan</label>
							<input type="text" class="form-control" placeholder="Masukan Nomor Ruangan" name="no_ruangan" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Gedung</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Gedung" name="gedung" required style="width: 60%;">
                        </div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
                    <?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
