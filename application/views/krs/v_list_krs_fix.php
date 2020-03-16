<div class="row">
	<div class="col-xs-9">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Responsive Hover Table</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
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
                        <?php foreach ($select as $krs) {?>
                            <tr>
                            <td><?= $krs->hari?></td>
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
                                <?php foreach ($select as $slc) {
                                    if($slc->nim){?>
                                    <a href="<?php echo base_url($this->uri->segment(1))."/store/".$krs->id_jadwalkuliah; ?>"><img src="<?php echo base_url()."assets/check.png" ?>" alt="edit" width="22" height="22"></a>
                                <?php }else{ ?>
                                    masuk
                                <?php } ?>
                                <?php } ?>
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
</div>
