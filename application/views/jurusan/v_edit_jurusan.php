<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Jurusan</h3>
				</div>
                <?php echo form_open_multipart("jurusan/update"); ?>
                <?php foreach ($jur as $jur) { ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Jurusan</label>
							<input type="hidden" class="form-control" name="id_jurusan" value="<?= $jur->id_jurusan;?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="nama" required style="width: 60%;" value="<?= $jur->nama_jurusan;?>">
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
