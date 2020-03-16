<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo $content ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("jurusan/create"); ?>" type="submit" class="btn btn-info btn-sm">Tambah <?= $content ?></a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Fakultas</th>
							<th>Nama Jurusan</th>
							<th>Akreditasi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($jur as $jur) {?>
                        <?php if ($jur->deleted != 1) {?>
						<tr>
							<td><?php echo $jur->nama_fakultas; ?></td>
							<td><?php echo $jur->nama_jurusan; ?></td>
							<td><?php echo $jur->akreditasi; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$jur->id_jurusan; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
                                <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$jur->id_jurusan; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
							</td>
						</tr>
						<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nama Fakultas</th>
							<th>Nama Jurusan</th>
							<th>Akreditasi</th>
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