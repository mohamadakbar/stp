<div class="row">
	<?php if(count($tagihan) != 0){?>
	<div class="col-xs-9">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data KRS </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
				<table id="krsdt" class="table table-bordered table-striped">
					<thead>
						<tr>
							<!-- <?php echo $this->session->userdata('nim');?> -->
							<th>Hari</th>
							<th>Jam</th>
							<th>Mata Kuliah</th>
							<th>Dosen</th>
							<th>Ruang</th>
							<th>Semester</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($krs as $krs) {?>
						<tr>
							<td><?= ucwords($krs->hari);?></td>
							<td>
								<?php 
                                    if ($krs->jam == 1) {
                                        echo "08.00 - 09.30";
                                    }elseif ($krs->jam == 2) {
                                        echo "09.30 - 11.00";
                                    }elseif ($krs->jam == 3) {
                                        echo "09.30 - 11.00";
                                    }elseif ($krs->jam == 4) {
                                        echo "13.00 - 15.00";
                                    }
                                ?>
							</td>
							<td><?= $krs->nama_matkul?></td>
							<td><?= $krs->nama_dosen?></td>
							<td><?= $krs->no_ruangan?></td>
							<td><?= $krs->semester?></td>
							<td>
								<a onclick="return deleletconfig()"
									href="<?php echo base_url($this->uri->segment(1))."/store/".$krs->id_jadwalkuliah; ?>"><img
										src="<?php echo base_url()."assets/check.png" ?>" alt="edit" width="22"
										height="22"></a>
								<!-- <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$krs->id_jadwalkuliah; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a> -->
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>

	<div class="col-xs-9">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data KRS yang diambil </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
				<table id="krsdt" class="table table-bordered table-striped">
					<thead>
						<tr>
							<!-- <?php echo $this->session->userdata('nim');?> -->
							<th bgcolor="#2980B9">Hari</th>
							<th bgcolor="#2980B9">Jam</th>
							<th bgcolor="#2980B9">Mata Kuliah</th>
							<th bgcolor="#2980B9">Dosen</th>
							<th bgcolor="#2980B9">Ruang</th>
							<th bgcolor="#2980B9">Semester</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($krsfix as $krs) {?>
						<tr>
							<td width="5%"><?= ucwords($krs->hari);?></td>
							<td>
								<?php 
                                    if ($krs->jam == 1) {
                                        echo "08.00 - 09.30";
                                    }elseif ($krs->jam == 2) {
                                        echo "09.30 - 11.00";
                                    }elseif ($krs->jam == 3) {
                                        echo "09.30 - 11.00";
                                    }elseif ($krs->jam == 4) {
                                        echo "13.00 - 15.00";
                                    }
                                ?>
							</td>
							<td><?= $krs->nama_matkul?></td>
							<td><?= $krs->nama_dosen?></td>
							<td><?= $krs->no_ruangan?></td>
							<td width="5%"><?= $krs->semester?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</div>
	<?php }else{?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(window).on('load', function () {
			$('#modal-warning').modal('show');
		});
	</script>
	<div class="modal modal-warning fade" id="modal-warning">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Perhatian !</h4>
				</div>
				<div class="modal-body">
					<p>Anda belum melakukan pembayaran Registrasi, silahkan melakukan pembayaran untuk mengakses KRS.</p>
				</div>
				<div class="modal-footer">
                    <a class="btn btn-warning" style="color: white" href="/helpdesk/home">Close</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php }?>
</div>
<?php echo $this->session->flashdata('message'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	function deleletconfig() {
		var del = confirm(
			"Apa anda yakin ingin mengambil jadwal ini?\r\nData ini tidak dapat di ubah, untuk mengubah jadwal, anda dapat mengunjungi staff IT"
		);
		return del;
	}

</script>
<script>
	$(function () {
		$(".hide-it").delay(2000).fadeOut(900);
	});

</script>
