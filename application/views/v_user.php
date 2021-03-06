<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        	<!-- <a href="<?php echo base_url("user/add"); ?>" type="submit" class="btn btn-info btn-sm">Tambah User</a><br><br> -->
        	<div class="card">
			    <div class="card-body">
			        <h5 class="card-title">Daftar User</h5>
			        <div class="table-responsive">
			            <table id="zero_config" class="table">
			                <thead>
			                    <tr>
			                        <th>Nama</th>
			                        <th>Email</th>
			                        <th>Divisi</th>
			                        <th>Foto</th>
                              <th>Status</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php foreach ($user as $usr) {
			                		if ($usr->id_user != $this->session->userdata('id')) {
			                	?>
			                    <tr>
			                        <td><?php echo $usr->nama; ?></td>
			                        <td><?php echo $usr->email; ?></td>
			                        <td><?php echo $usr->nama_div; ?></td>
                              <td>
                                <?php if ($usr->foto == null) {?>
                                  <img src="<?php echo base_url().'upload/user/default.png' ;?>" width="80" height="80" >
                                <?php }else{ ?>
                                  <img src="<?php echo base_url().'upload/user/'.$usr->foto; ?>" width="80" height="80">
                                <?php } ?>
                              </td>
                              <td>
                                <?php if ($usr->aktif == 0) {?>
                                  <p style="font-size: 12px"><span class="label label-danger">Tidak Aktif</span></p>
                                <?php } elseif($usr->aktif == 1) { ?>
                                  <p style="font-size: 12px"><span class="label label-success sm">User Aktif</span></p>
                                <?php } elseif($usr->aktif == 2) { ?>
                                  <p style="font-size: 12px"><span class="label label-warning sm">User Baru</span></p>
                                <?php } ?>
                              </td>
			                        <td>
			                        	<a href="<?php echo base_url()."user/edit/".$usr->id_user; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
			                        	<a href="<?php echo base_url()."user/editrole/".$usr->id_user; ?>"><img src="<?php echo base_url()."assets/gear.png" ?>" width="22" height="22"></a>
			                        </td>
			                    </tr>
			                    <?php } ?>
			                    <?php } ?>
			                </tbody>
			                <tfoot>
			                    <tr>
			                        <th>Nama</th>
			                        <th>Email</th>
			                        <th>Divisi</th>
			                        <th>Foto</th>
                              <th>Status</th>
			                    </tr>
			                </tfoot>
			            </table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>