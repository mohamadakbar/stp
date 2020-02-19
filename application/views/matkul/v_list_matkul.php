<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("matkul/create"); ?>" type="submit" class="btn btn-info btn-sm">Add Mata Kuliah</a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Dosen Pengampu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($matkul as $mk) {?>
                        <?php if ($mk->deleted != 1) {?>
						<tr>
							<td><?php echo $mk->nama_matkul; ?></td>
							<td><?php echo $mk->sks; ?></td>
							<td><?php echo $mk->nama_dosen; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$mk->id_matkul; ?>"><img
										src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22"
										height="22"></a>
								<a href="<?php echo base_url($this->uri->segment(1))."/editrole/".$mk->id_matkul; ?>"><img src="<?php echo base_url()."assets/gear.png" ?>" width="22" height="22"></a>
                                <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$mk->id_matkul; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
							</td>
						</tr>
						<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>Nama Mata Kuliah</th>
							<th>Jumlah SKS</th>
							<th>Dosen Pengampu</th>
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