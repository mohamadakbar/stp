<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Jadwal</h3>
				</div>
				<?php echo form_open_multipart("jadwalkuliah/store"); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Tahun</label>
								<select class="select2 form-control custom-select" name="tahun">
									<option value="">Select</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mata Kuliah</label>
						<select class="select2 form-control custom-select" name="matkul">
							<option value="">Select</option>
							<?php foreach ($matkul as $mk) {?>
							<option value="<?= $mk->id_matkul?>"><?= $mk->nama_matkul?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group add-field">
						<div class="partners">
							<div class="partner">
								<div class="row">
									<div class="col-xs-2">
										<label>Hari</label>
										<select class="select2 form-control custom-select" name="hari[]">
											<option value="">Select</option>
											<option value="senin">Senin</option>
											<option value="selasa">Selasa</option>
											<option value="rabu">Rabu</option>
											<option value="kamis">Kamis</option>
											<option value="jumat">Jumat</option>
										</select><br>
									</div>
									<div class="col-xs-2">
										<label>Jam</label>
										<select class="select2 form-control custom-select" name="jam[]">
											<option value="">Select</option>
											<option value="1">08.00 - 09.30</option>
											<option value="2">09.30 - 11.00</option>
											<option value="3">11.00 - 12.00</option>
											<option value="3">13.00 - 15.00</option>
										</select><br>
									</div>
									<div class="col-xs-3">
										<label>Dosen</label>
										<select class="select2 form-control custom-select" name="dosen[]">
											<option value="">Select</option>
											<?php foreach ($dosen as $dsn) {?>
											<option value="<?= $dsn->id_dosen?>"><?= $dsn->nama_dosen?></option>
											<?php } ?>
										</select><br>
									</div>
									<div class="col-xs-3">
										<label>Ruangan</label>
										<select class="select2 form-control custom-select" name="ruangan[]">
											<option value="">Select</option>
											<?php foreach ($ruang as $r) {?>
											<option value="<?= $r->id_kelas?>"><?= $r->no_ruangan?></option>
											<?php } ?>
										</select><br>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="btn btn-warning add-more"><span>Add Field</span></div>
				</div>
				<div class="box-footer">
					<div onclick="history.go(-1);" class="btn btn-danger pull-right" style="margin-right:10px"><span>Back</span></div>
					<button type="submit" class="btn btn-primary pull-right" style="margin-right:10px">Submit</button>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
</div>
<script>
	$(document).ready(function () {

		var data_fo = $('.partner').html();
		var sd = '<div class="btn btn-danger remove-add-more">Remove</div>';
		var max_fields = 5; //maximum input boxes allowed
		var wrapper = $(".partners"); //Fields wrapper
		var add_button = $(".add-more"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function (e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				var partnerClone = $('.partner').first().clone();
				// $(sd).appendTo(partnerClone);
				// console.log(data_fo);
				$(wrapper).append(partnerClone);
			}
		});

		$(wrapper).on("click", ".remove-add-more", function (e) { //user click on remove text
			e.preventDefault();
			$(this).parent('.partner').remove();
			$(this).remove();
			x--;
		});
	});

</script>
