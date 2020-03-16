<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Fakultas</h3>
				</div>
				<?php echo form_open_multipart("fakultas/store"); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Fakultas</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Fakultas" name="fakultas" required style="width: 60%;">
                        </div>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Akreditasi</label>
							<input type="text" class="form-control" placeholder="Masukan Akreditasi" name="akr" required style="width: 60%;">
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
