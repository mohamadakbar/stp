<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("mahasiswa/create"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Mahasiswa</a>
			<div class="box-body">
			<?php echo $this->session->flashdata('message'); ?>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Mahasiswa</th>
							<th>Email</th>
							<th>Fakultas</th>
							<th>Jurusan</th>
							<th>Semester</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($mahasiswa as $mhs) {?>
                        <?php if ($mhs->deleted != 1) {?>
						<tr>
							<td><?php echo $mhs->nama_mahasiswa; ?></td>
							<td><?php echo $mhs->email; ?></td>
							<td><?php echo $mhs->fakultas; ?></td>
							<td><?php echo $mhs->jurusan; ?></td>
							<td><?php echo $mhs->semester; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$mhs->nim; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
								<a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$mhs->nim; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
								<a href="<?php echo base_url($this->uri->segment(1))."/editrole/".$mhs->nim; ?>"><img src="<?php echo base_url()."assets/gear.png" ?>" width="22" height="22"></a>
							</td>
						</tr>
						<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nama Mahasiswa</th>
							<th>Email</th>
							<th>Fakultas</th>
							<th>Jurusan</th>
							<th>Semester</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
    function deleletconfig(){

    var del=confirm("Apa anda yakin ingin menghapus data ini?");
    
    return del;
    }
</script>