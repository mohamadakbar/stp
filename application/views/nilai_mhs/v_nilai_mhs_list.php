<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
                <div class="box-body">
                    <h3>Grafik Nilai</h3>  
                    <div id="graph"></div>
                </div>
            </div>
        </div>
		<div class="col-md-6">
			<div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data <?php echo ucfirst($this->uri->segment(1)) ?></h3>
                </div>
                <div class="box-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <table id="countnilai" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nilai as $n) { ?>
                            <tr>
                                <td style="width:10%"><?php echo $no++; ?></td>
                                <td style="width:80%"><?php echo $n->nama_matkul; ?></td>
                                <td style="width:80%"><?php echo $n->sks; ?></td>
                                <td style="width:10%"><?php echo $n->nilai; ?></td>
                                <td style="width:10%"><?php echo $n->bobot; ?></td>
                                <td style="width:10%"><?php echo $n->total; ?></td>
                            </tr>
                            <?php } ?>
                            <?php foreach ($total as $tot) { ?>
                            <tr>
                                <td colspan="2" style="padding-left:20%;"><b>Total</b></td>
                                <td><?php echo $tot->totalsks; ?></td>
                                <td><?php echo $tot->ipk; ?></td>
                                <td></td>
                                <td><?php echo $tot->totalbobot;?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-left:20%;"><b>IPK</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="btn btn-success btn-sm"><?php echo $tot->ipk; ?></span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/morris.js/morris.min.js"></script>
<script>
  Morris.Bar({
    barSize:30,
//   barSizeRatio:0.55,
      element: 'graph',
      resize: true,
      data: <?php echo $charts;?>,
      xkey: 'nama_matkul',
      ykeys: ['bobot'], //bar yg ditamillkan
      labels: ['Bobot'], //label yg melayang
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
</script>
<script>
  $(function () {
    var dataTable = $('#countnilai').DataTable();
  })
</script>