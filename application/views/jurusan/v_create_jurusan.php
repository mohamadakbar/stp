<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Jurusan</h3>
				</div>
				<?php echo form_open_multipart("jurusan/store"); ?>
					<div class="box-body">
						<div class="form-group">
							<label>Fakultas</label>
							<select class="select2 form-control custom-select" name="fak" style="width: 40%;">
								<option value="">Select</option>
								<?php foreach ($fak as $fk) {?>
									<option value="<?= $fk->id_fakultas?>"><?= $fk->nama_fakultas?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="nama">Nama Jurusan</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Jurusan" name="jurusan" required style="width: 60%;">
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
