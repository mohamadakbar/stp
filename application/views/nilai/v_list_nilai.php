<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Input Nilai</h3>
				</div>
				<?php echo form_open_multipart("nilai/search"); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Tahun Ajaran</label>
								<select class="select2 form-control custom-select" id="tahun" name="tahun" required>
									<option value="">Pilih</option>
									<option value="2020">2020</option>
									<option value="2019">2019</option>
									<option value="2018">2018</option>
								</select>
							</div>
							<div class="col-xs-6">
								<label>Semester</label>
								<select class="select2 form-control custom-select" required id="semester" name="semester">
									<option value="">Pilih</option>
									<option value="1">I</option>
									<option value="2">II</option>
									<option value="3">III</option>
									<option value="4">IV</option>
									<option value="5">V</option>
									<option value="6">VI</option>
									<option value="7">VII</option>
									<option value="8">VIII</option>
									<option value="9">IX</option>
									<option value="10">X</option>
									<option value="11">XI</option>
									<option value="12">XII</option>
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
										<select class="select2 form-control custom-select" name="matkul" required ">
											<option value="">Select</option>
											<?php foreach ($matkul as $mk) {?>
											<option value="<?php echo $mk->id_matkul;?>"><?php echo $mk->nama_matkul;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-xs-2">
										<label>NIM</label>
										<input type="text" class="form-control" placeholder="Masukan SKS" name="nim">
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
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->session->flashdata('message'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$(function () {
		$(".hide-it").delay(2000).fadeOut(900);
	});
</script>
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