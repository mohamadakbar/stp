<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
			</div>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("tagihan/create"); ?>" type="submit" class="btn btn-info btn-sm">Add <?php echo $this->uri->segment(1); ?></a>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Pembayaran</th>
							<th>Jumlah Tagihan</th>
							<th>Tanggal Bayar</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($tagihan as $tgh) {?>
						<tr>
							<td><?php echo $tgh->nim; ?></td>
							<td><?php echo $tgh->nama_mahasiswa; ?></td>
							<td><?php echo ucfirst($tgh->pembayaran); ?></td>
							<td>Rp. <?php echo number_format($tgh->jumlah_tagihan,2,',','.');?></td>
							<td><?php echo $tgh->tgl_bayar; ?></td>
							<td><?php echo $tgh->status; ?></td>
							<td>
								<a href="<?php echo base_url($this->uri->segment(1))."/edit/".$tgh->id_tagihan; ?>"><img
										src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22"
										height="22"></a>
                                <a onclick="return deleletconfig()" href="<?php echo base_url($this->uri->segment(1))."/delete/".$tgh->id_tagihan; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Pembayaran</th>
							<th>Jumlah Tagihan</th>
							<th>Tanggal Bayar</th>
							<th>Status</th>
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