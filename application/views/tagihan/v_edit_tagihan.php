<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Matkul</h3>
				</div>
				<?php echo form_open_multipart("tagihan/update"); ?>
                <?php foreach ($tag as $tag) {?>
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Nama Mahasiswa</label>
								<select class="select2 form-control custom-select" name="nim" >
									<option value="<?= $tag->nim?>"><?= $tag->nama_mahasiswa?></option>
								</select>
							</div>
							<div class="col-xs-6">
								<label>Pembayaran</label>
								<select class="select2 form-control custom-select" required name="pembayaran">
                                    <option value="<?= $tag->pembayaran?>"><?= ucfirst($tag->pembayaran);?></option>
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
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp. </span>
                                            <input type="text" class="form-control" id="rupiah" placeholder="Masukan jumlah_tagihan" name="jumlah_tagihan" required value="<?= $tag->jumlah_tagihan?>">
                                            <input type="hidden" name="id_tag" value="<?= $tag->id_tagihan?>">
                                        </div>
										<!-- <label>Jumlah Tagihan</label>
                                        <span class="input-group-addon">$</span>
										<input type="text" class="form-control" id="jml_tagihan" placeholder="Masukan jumlah_tagihan" name="jumlah_tagihan" required value="<?= $tag->jumlah_tagihan?>">
										<input type="hidden" name="id_tag" value="<?= $tag->id_tagihan?>"> -->
									</div>
									<div class="col-xs-8">
										<label>Status</label>
										<select class="select2 form-control custom-select" name="status" >
											<option value="<?= $tag->status?>"><?= $tag->status?></option>
											<option value="Lunas">Lunas</option>
											<option value="Belum Lunas">Belum Lunas</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<!-- <div class="btn btn-warning add-more"><span>Add Field</span></div> -->
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
                <?php } ?>
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
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
	</script>