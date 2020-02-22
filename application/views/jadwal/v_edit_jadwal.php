<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Kelas</h3>
				</div>
                <?php echo form_open_multipart("kelas/update"); ?>
                <?php foreach ($kelas as $kls) { ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nomor Ruangan</label>
							<input type="hidden" class="form-control" name="id_kls" value="<?= $kls->id_kelas;?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="no_ruangan" required style="width: 60%;" value="<?= $kls->no_ruangan;?>">
                        </div>
                        <div class="form-group">
							<label for="nama">Gedung</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="gedung" required style="width: 60%;" value="<?= $kls->gedung;?>">
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
