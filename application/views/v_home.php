<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $hitdosen; ?></h3>
                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()."dosen" ?>" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Details<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $hitmhs; ?></h3>
                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('mahasiswa') ?>" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <h3>Grafik Laporan</h3>  
    <div id="graph"></div>
    <?php if(count($tagihan) == 0){
        if($this->session->userdata('nim')){?>
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-warning"></i> Pengumuman!</h4>
            Anda belum melakukan pembayaran Registrasi, silahkan melakukan pembayaran untuk mengakses KRS.
        </div>
        <?php } ?>
    <?php }else{ ?>
        
    <?php } ?>
    <?php //echo $this->session->userdata('nim');?>
</div>