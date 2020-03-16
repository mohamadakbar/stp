<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("fakultas/create"); ?>" type="submit" class="btn btn-info btn-sm">Tambah Fakultas</a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Fakultas</th>
							<th>Akreditasi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($fak as $fak) {?>
                        <?php if ($fak->deleted != 1) {?>
						<tr>
							<td><?php echo $fak->nama_fakultas; ?></td>
							<td><?php echo $fak->akreditasi; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$fak->id_fakultas; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
                                <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$fak->id_fakultas; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
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