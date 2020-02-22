<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("kelas/create"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Kelas</a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Ruang</th>
							<th>Gedung</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($kelas as $kls) {?>
                        <?php if ($kls->deleted != 1) {?>
						<tr>
							<td><?php echo $kls->no_ruangan; ?></td>
							<td><?php echo $kls->gedung; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$kls->id_kelas; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
                                <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$kls->id_kelas; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
							</td>
						</tr>
						<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>Nama Ruang</th>
							<th>Gedung</th>
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