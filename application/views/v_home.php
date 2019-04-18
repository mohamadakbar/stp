<div class="container-fluid">
    <div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">

            <div class="box bg-cyan text-center">
              <a href="<?php echo base_url()."ticket" ?>" title="">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">
                    <?php foreach ($notif as $not) {
                        if ($not->flag == 0) {
                    ?>
                        <span class="badge badge-danger">New</span>
                    <?php } ?>
                    <?php } ?>
                    Tiket
                </h6>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                  <?php echo $hitung; ?>
                </h1>
                <h6 class="text-white">Laporan</h6>
            </div>
        </div>
    </div>
     <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                <h6 class="text-white">Widgets</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                <h6 class="text-white">Tables</h6>
            </div>
        </div>
    </div>
</div>
</div>
<h3>Grafik Laporan</h3>  
<div id="graph"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    Morris.Bar({
      element: 'graph',
      data: <?php echo $data;?>,
      xkey: 'nama',
      ykeys: ['create_at'],
      labels: ['Tahun']
    });
</script>