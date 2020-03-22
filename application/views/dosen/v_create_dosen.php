<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Dosen</h3>
				</div>
				<?php echo form_open_multipart("dosen/store"); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="hidden" class="form-control" placeholder="Masukan Nama Dosen" name="kode" required value="<?php echo $kode;?>" style="width: 60%;">
							<input type="text" class="form-control" placeholder="Masukan Nama Dosen" name="nama_dosen" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Pendidikan</label>
							<input type="text" class="form-control" placeholder="Masukan Pendidikan" name="pendidikan" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Email</label>
							<input type="text" class="form-control" placeholder="Masukan Email" name="email" required style="width: 60%;">
                        </div>
                        <div class="form-group">
							<label for="nama">Password</label>
							<input type="password" class="form-control" placeholder="Masukan Password" name="password" required style="width: 60%;">
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
