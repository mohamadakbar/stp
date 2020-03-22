<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Dosen</h3>
				</div>
                <?php echo form_open_multipart("dosen/update"); ?>
                <?php foreach ($dosen as $dsn) { ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Dosen</label>
							<input type="hidden" class="form-control" name="id_dosen" value="<?= $dsn->id_dosen;?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Dosen" name="nama_dosen" required style="width: 60%;" value="<?= $dsn->nama_dosen;?>">
                        </div>
                        <div class="form-group">
							<label for="nama">Email</label>
							<input type="text" class="form-control" placeholder="Masukan Pendidikan" name="email" required style="width: 60%;" value="<?= $dsn->email;?>">
                        </div>
                        <div class="form-group">
							<label for="nama">Pendidikan</label>
							<input type="text" class="form-control" placeholder="Masukan Pendidikan" name="pendidikan" required style="width: 60%;" value="<?= $dsn->pendidikan;?>">
                        </div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                <?php } ?>
                <?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
