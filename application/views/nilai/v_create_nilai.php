<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Matkul</h3>
				</div>
				<?php echo form_open_multipart("matkul/store"); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Fakultas</label>
								<select class="select2 form-control custom-select" id="fakultas" name="fakultas" >
									<option value="">Select</option>
									<?php foreach ($fak as $fak) {?>
									<option value="<?= $fak->id_fakultas?>"><?= $fak->nama_fakultas?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-6">
								<label>Jurusan</label>
								<select class="select2 form-control custom-select" required id="jurusan" name="jurusan">
									<option>Pilih</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group add-field">
						<div class="partners">
							<div class="partner">
								<div class="row">
									<div class="col-xs-4">
										<label>Nama Mata Kuliah</label>
										<input type="text" class="form-control" id="nama_mk" placeholder="Masukan Nama Mata Kuliah" name="nama_mk[]" required>
									</div>
									<div class="col-xs-4">
										<label>Nama Dosen</label>
										<select class="select2 form-control custom-select" name="dosen[]">
											<option value="">Select</option>
											<?php foreach ($dosen as $dsn) {?>
											<option value="<?= $dsn->id_dosen?>"><?= $dsn->nama_dosen?></option>
											<?php } ?>
										</select><br>
									</div>
									<div class="col-xs-2">
										<label>Semester</label>
										<select class="select2 form-control custom-select" name="semester[]" >
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
									<div class="col-xs-2">
										<label>SKS</label>
										<input type="text" class="form-control" placeholder="Masukan SKS" name="sks[]" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function () {

		var data_fo = $('.partner').html();
		var sd = '<div class="btn btn-danger remove-add-more">Remove</div>';
		var max_fields = 5; //maximum input boxes allowed
		var wrapper = $(".partners"); //Fields wrapper
		var nama_mk = $("#nama_mk"); //Fields wrapper
		var add_button = $(".add-more"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function (e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				// $('#nama_mk').val('');
				var partnerClone = $('.partner').first().clone();
				// $(sd).appendTo(partnerClone);
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
<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		$("#fakultas").on('change',function(){
			var getValue=$(this).val();
			// console.log(getValue);
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("mahasiswa/getID"); ?>", // Isi dengan url/path file php yang dituju
				data: {id_fakultas : $("#fakultas").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ // Ketika proses pengiriman berhasil
					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					// console.log(response)
					$("#jurusan").html(response);
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
    // Kita sembunyikan dulu untuk loadingnya
    // $("#loading").hide();
	// prov = $("#fakultas").value();
    
    // $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
    //   $("#kota").hide(); // Sembunyikan dulu combobox kota nya
    //   $("#loading").show(); // Tampilkan loadingnya
    
    // });
  });
</script>