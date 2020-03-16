<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Matkul</h3>
				</div>
				<?php echo form_open_multipart("tagihan/store"); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Nama Mahasiswa</label>
								<select class="select2 form-control custom-select" id="fakultas" name="nim" >
									<option value="">Select</option>
									<?php foreach ($mhs as $mhs) {?>
									<option value="<?= $mhs->nim?>"><?= $mhs->nama_mahasiswa?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-6">
								<label>Pembayaran</label>
								<select class="select2 form-control custom-select" required name="pembayaran">
									<option value="">Pilih</option>
									<option value="regis">Registrasi</option>
									<option value="sks">SKS</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group add-field">
						<div class="partners">
							<div class="partner">
								<div class="row">
									<div class="col-xs-4">
										<label>Jumlah Tagihan</label>
										<input type="text" class="form-control" id="jml_tagihan" placeholder="Masukan jumlah_tagihan" name="jumlah_tagihan" required>
									</div>
									<div class="col-xs-8">
										<label>Status</label>
										<select class="select2 form-control custom-select" name="status" >
											<option value="">Select</option>
											<option value="Lunas">Lunas</option>
											<option value="Belum Lunas">Belum Lunas</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="btn btn-warning add-more"><span>Add Field</span></div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<!-- <div class="box-body">
					<div class="form-group">
						<label for="nama">Nama Matkul</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="nama_mk" required style="width: 60%;">
					</div>
					<div class="form-group">
						<label>Dosen</label>
						<select class="select2 form-control custom-select" name="nama_dosen" required style="width: 60%;">
							<option value="">Select</option>
							<?php foreach ($dosen as $d) {?>
							<option value="<?php echo $d->id_dosen;?>"><?php echo $d->nama_dosen;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Semester</label>
						<select class="select2 form-control custom-select" name="semester" style="width: 60%;">
							<option value="">Select</option>
							<option value="1">I</option>
							<option value="2">II</option>
							<option value="3">III</option>
							<option value="4">IV</option>
							<option value="5">V</option>
							<option value="6">VI</option>
							<option value="7">VII</option>
							<option value="8">VIII</option>
						</select>
					</div>
					<div class="form-group">
						<label for="nama">Jumlah SKS</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="sks" required style="width: 60%;">
					</div>
				</div> -->
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>