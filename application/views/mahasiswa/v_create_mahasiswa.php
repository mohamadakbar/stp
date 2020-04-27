<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Kelas</h3>
				</div>
				<?php echo form_open_multipart("mahasiswa/store"); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Mahasiswa</label>
							<input type="hidden" class="form-control" name="id_akses" required style="width: 60%;" value="<?php echo $kode; ?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Mahasiswa" name="nama_mhs" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Email</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Gedung" name="email" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Password</label>
							<input type="password" class="form-control" placeholder="Masukan Password" name="password" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label>Fakultas</label>
							<select class="select2 form-control custom-select" id="fakultas" name="fakultas" style="width: 40%;">
								<option value="">Select</option>
								<?php foreach ($fak as $fak) {?>
								<option value="<?= $fak->id_fakultas?>"><?= $fak->nama_fakultas?></option>
								<?php } ?>
							</select>
						</div>
                        <div class="form-group">
							<label>Jurusan</label>
							<select class="select2 form-control custom-select" required id="jurusan" name="jurusan" style="width: 40%;">
							</select>
						</div>
                        <div class="form-group">
							<label for="nama">Semester</label>
							<input type="text" class="form-control" placeholder="Masukan Semester" name="semester" required style="width: 60%;">
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		$("#fakultas").on('change',function(){
			var getValue=$(this).val();
			// console.log(getValue);
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("mahasiswa/getID"); ?>", // Isi dengan url/path file php yang dituju
				data: {id_fakultas : getValue}, // data yang akan dikirim ke file yang dituju
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

  	});
</script>