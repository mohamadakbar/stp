<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Role dosen</h3>
			</div>
			<?php echo form_open_multipart('dosen/updaterole') ?>
			<?php foreach ($dosen as $dsn) { ?>
			<div class="box-body">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" readonly class="form-control" name="nama" value="<?php echo $dsn->nama_dosen; ?>">
				</div>
				<div class="form-group">
					<label for="nama">Kode Akses</label>
					<input type="text" readonly class="form-control" name="id_akses" value="<?php echo $dsn->id_akses; ?>">
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Akses </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<ul>
						<?php foreach ($menu as $rl) {
                        if ($rl->parent == 1) {
                    ?>
						<li>
							<input type="checkbox" name="check_list[]" alt="Checkbox"
								value="<?php echo $rl->id_menu; ?>" <?php foreach ($role as $ak) { if ($ak->id_menu == $rl->id_menu) { echo "checked"; } }
                                ?>>
							<?php echo $rl->nama_menu; ?>
							<ul>
								<?php foreach ($menu as $cld) {
                                    if ($cld->child == $rl->id_menu) {
                                ?>
								<li>
									<input type="checkbox" name="check_list[]" alt="Checkbox"
										<?php foreach ($role as $aks) { if ($aks->id_menu == $cld->id_menu) { echo "checked"; } }?>
										value="<?php echo $cld->id_menu; ?>">
									<?php echo $cld->nama_menu; ?>
								</li>
								<?php } ?>
								<?php } ?>
							</ul>
						</li>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
            </div>
            <div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
