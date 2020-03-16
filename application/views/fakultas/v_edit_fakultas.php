<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Fakultas</h3>
				</div>
                <?php echo form_open_multipart("fakultas/update"); ?>
                <?php foreach ($fak as $fak) { ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Fakultas</label>
							<input type="hidden" class="form-control" name="id_fakultas" value="<?= $fak->id_fakultas;?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="nama" required style="width: 60%;" value="<?= $fak->nama_fakultas;?>">
                        </div>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Akreditasi</label>
							<input type="text" class="form-control" placeholder="Masukan Akreditasi" name="akr" required style="width: 60%;" value="<?= $fak->akreditasi;?>">
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
