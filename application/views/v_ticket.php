<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        		<a href="<?php echo base_url("ticket/create"); ?>" type="submit" class="btn btn-info btn-sm">Buat Ticket</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url("prints"); ?>" type="submit" class="btn btn-info btn-sm">Cetak</a><br><br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Ticket</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table">
                            <thead>
                                <tr>
                                    <th>No Ticket</th>
                                    <th>Nama Staff</th>
                                    <th>Divisi</th>
                                    <th>Kategori</th>
                                    <th width="100px">Masalah</th>
                                    <th>Status</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ticket as $tik) {?>
                                <?php if ($this->session->userdata('level') == 1) {?>
                                <tr>
                                    <td>
                                        <?php echo $tik->no_tiket; ?>
                                        <?php if ($tik->flag != 1) {?>
                                            <span class="badge badge-pill badge-danger float-right">New</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $tik->nama; ?></td>
                                    <td><?php echo $tik->nama_div; ?></td>
                                    <td><?php echo $tik->nama_kat; ?></td>
                                    <td><?php echo $tik->masalah; ?></td>
                                    <td>
                                        <?php if ($tik->no_sts == 1) { ?>
                                            <span class="badge badge-pill badge-danger"><?php echo $tik->nama_sts;?></span>
                                        <?php } elseif ($tik->no_sts == 2) {?>
                                            <span class="badge badge-pill badge-warning "><?php echo $tik->nama_sts;?></span>
                                        <?php } elseif ($tik->no_sts == 3) {?>
                                            <span class="badge badge-pill badge-success"><?php echo $tik->nama_sts;?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($this->session->userdata('level') == 1){?>
                                            <a href="<?php echo base_url()."ticket/edit/".$tik->no_tiket; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
                                            <a href="<?php echo base_url()."ticket/detail/".$tik->no_tiket;?>"><img src="<?php echo base_url()."assets/detail.png" ?>" alt="edit" width="22" height="22"></a>
                                            <a onclick="return deleletconfig()" href="<?php echo base_url()."ticket/delete/".$tik->no_tiket; ?>"><img src="<?php echo base_url()."assets/del.png" ?>" alt="edit" width="22" height="22"></a>
                                            <a href="<?php echo base_url()."ticket/progress/".$tik->no_tiket; ?>" class="btn btn-sm btn-outline-secondary">Progress</a>
                                            <a href="<?php echo base_url()."ticket/closed/".$tik->no_tiket; ?>" class="btn btn-sm btn-outline-secondary">Closed</a>
                                        <?php } elseif($this->session->userdata('level') != 1) {?>
                                            <a href="<?php echo base_url()."ticket/edit/".$tik->no_tiket; ?>" class="btn btn-cyan btn-sm">Edit</a>
                                            <button type="button" class="btn btn-success btn-sm">Detail</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                                
                            	<?php } elseif ($this->session->userdata('level') != 1) {
                                    if ($this->session->userdata('id') == $tik->id_user) { ?>
                                    <tr>
                                    <td><?php echo $tik->no_tiket; ?></td>
                                    <td><?php echo $tik->nama; ?></td>
                                    <td><?php echo $tik->nama_div; ?></td>
                                    <td><?php echo $tik->nama_kat; ?></td>
                                    <td><?php echo $tik->masalah; ?></td>
                                    <td>
                                        <?php if ($tik->no_sts == 1) { ?>
                                            <span class="badge badge-pill badge-danger"><?php echo $tik->nama_sts;?></span>
                                        <?php } elseif ($tik->no_sts == 2) {?>
                                            <span class="badge badge-pill badge-warning "><?php echo $tik->nama_sts;?></span>
                                        <?php } elseif ($tik->no_sts == 3) {?>
                                            <span class="badge badge-pill badge-success"><?php echo $tik->nama_sts;?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($this->session->userdata('level') == 1){?>
                                            <a href="<?php echo base_url()."ticket/edit/".$tik->no_tiket; ?>" class="btn btn-cyan btn-sm">Edit</a>
                                            <a href="<?php echo base_url()."ticket/detail/".$tik->no_tiket;?>" class="btn btn-success btn-sm">Detail</a>
                                            <a href="<?php echo base_url()."ticket/delete/".$tik->no_tiket; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                <?php if ($tik->flag != 1) {?>
                                                    <span class="badge badge-pill badge-danger float-right">New</span>
                                                <?php } ?>
                                        <?php } elseif($this->session->userdata('level') != 1) {?>
                                            <a href="<?php echo base_url()."ticket/edit/".$tik->no_tiket; ?>"><img src="<?php echo base_url()."assets/edit.png" ?>" alt="edit" width="22" height="22"></a>
                                            <a href="<?php echo base_url()."ticket/detail/".$tik->no_tiket; ?>"><img src="<?php echo base_url()."assets/detail.png" ?>" alt="edit" width="22" height="22"></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                                <?php } ?>
                        </table>
                    </div>
                </div>
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