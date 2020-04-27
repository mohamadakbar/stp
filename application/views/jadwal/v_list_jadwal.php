<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			<?php foreach ($getuser as $user) {
				if ($user->jabatan == 2) { // kondisi untuk admin?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("jadwalkuliah/create"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Jadwal</a>
				<?php } ?>
			<?php } ?>
			<!-- kondisi untuk admin -->
			<?php if ($this->session->userdata('id')) {?>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<?php foreach ($getuser as $user) { ?>
						<thead>
							<tr>
								<th>Tahun</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Mata Kuliah</th>
								<th>Dosen</th>
								<th>Semester</th>
								<th>Ruangan</th>
								<th>Gedung</th>
								<th>Jurusan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
								<?php foreach ($jadwal as $jdwl) {?>
								<?php if ($jdwl->deleted != 1) {?>
							<tr>
								<td width="5%"><?php echo ucwords($jdwl->tahun); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->hari); ?></td>
								<td width="10%">
									<?php 
										if ($jdwl->jam == 1) {
											echo "08.00 - 09.30";
										}elseif ($jdwl->jam == 2) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 3) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 4) {
											echo "13.00 - 15.00";
										}
									?>
								</td>
								<td width="13%"><?php echo ucwords($jdwl->nama_matkul); ?></td>
								<td width="13%"><?php echo ucwords($jdwl->nama_dosen); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->semester); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->no_ruangan); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->gedung); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->nama_jurusan); ?></td>
								<td width="5%">
									<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$jdwl->id_jadwalkuliah; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
									<a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$jdwl->id_jadwalkuliah; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
								</td>
							</tr>
							<?php } ?>
							<?php } ?>
							<?php } ?>
							<!-- <div class="box-body ?>">
								<?php echo form_open_multipart("jadwalkuliah/search"); ?>
								<div class="input-group input-group-sm col-xs-2">
									<input type="text" class="form-control" name="semester">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-info btn-flat">Search</button>
									</span>
								</div>
								<?php echo form_close(); ?><br>
								<div onclick="history.go(-1);" class="btn btn-danger" style="margin-right:10px"><span>Back</span></div>
							</div> -->
						</tbody>
					</table>
				</div>
			<?php } ?>
			<!-- end kondisi untuk admin -->

			<!-- kondisi untuk mhs -->
			<?php if ($this->session->userdata('nim')) {?>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Tahun</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Mata Kuliah</th>
								<th>Dosen</th>
								<th>Semester</th>
								<th>Ruang</th>
								<th>Gedung</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($krsfix as $jdwl) {?>
							<tr>
								<td width="5%"><?php echo ucwords($jdwl->tahun); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->hari); ?></td>
								<td width="10%">
									<?php 
										if ($jdwl->jam == 1) {
											echo "08.00 - 09.30";
										}elseif ($jdwl->jam == 2) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 3) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 4) {
											echo "13.00 - 15.00";
										}
									?>
								</td>
								<td width="13%"><?php echo ucwords($jdwl->nama_matkul); ?></td>
								<td width="13%"><?php echo ucwords($jdwl->nama_dosen); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->semester); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->no_ruangan); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->gedung); ?></td>
							</tr>
							<?php } ?>
							<!-- <div class="box-body ?>">
								<?php echo form_open_multipart("jadwalkuliah/search"); ?>
								<div class="input-group input-group-sm col-xs-2">
									<input type="text" class="form-control" name="semester">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-info btn-flat">Search</button>
									</span>
								</div>
								<?php echo form_close(); ?><br>
								<div onclick="history.go(-1);" class="btn btn-danger" style="margin-right:10px"><span>Back</span></div>
							</div> -->
						</tbody>
					</table>
				</div>
			<?php } ?>
			<!-- end kondisi untuk mhs -->

			<!-- kondisi untuk dosen -->
			<?php if ($this->session->userdata('id_dosen')) {?>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Tahun</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Mata Kuliah</th>
								<th>Dosen</th>
								<th>Semester</th>
								<th>Ruang</th>
								<th>Gedung</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($jadwalDosen as $jdwl) {?>
								<?php if ($jdwl->deleted != 1) {?>
							<tr>
								<td width="5%"><?php echo ucwords($jdwl->tahun); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->hari); ?></td>
								<td width="10%">
									<?php 
										if ($jdwl->jam == 1) {
											echo "08.00 - 09.30";
										}elseif ($jdwl->jam == 2) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 3) {
											echo "09.30 - 11.00";
										}elseif ($jdwl->jam == 4) {
											echo "13.00 - 15.00";
										}
									?>
								</td>
								<td width="13%"><?php echo ucwords($jdwl->nama_matkul); ?></td>
								<td width="13%"><?php echo ucwords($jdwl->nama_dosen); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->semester); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->no_ruangan); ?></td>
								<td width="5%"><?php echo ucwords($jdwl->gedung); ?></td>
							</tr>
							<?php } ?>
							<?php } ?>
							<!-- <div class="box-body ?>">
								<?php echo form_open_multipart("jadwalkuliah/search"); ?>
								<div class="input-group input-group-sm col-xs-2">
									<input type="text" class="form-control" name="semester">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-info btn-flat">Search</button>
									</span>
								</div>
								<?php echo form_close(); ?><br>
								<div onclick="history.go(-1);" class="btn btn-danger" style="margin-right:10px"><span>Back</span></div>
							</div> -->
						</tbody>
					</table>
				</div>
			<?php } ?>
			<!-- end kondisi untuk dosen -->
		</div>
	</div>
</div>
<script>
    function deleletconfig(){

    var del=confirm("Apa anda yakin ingin menghapus data ini?");
    
    return del;
    }
</script>