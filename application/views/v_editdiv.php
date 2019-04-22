<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <?php echo form_open_multipart("divisi/update"); ?>
                    <div class="card-body">
                        <h4 class="card-title">Edit Divisi</h4>
                        <?php foreach ($div as $d) { ?>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Divisi</label>
                            <div class="col-sm-6 ">
                                <input type="text" required class="form-control" value="<?php echo $d->nama_div;?>" name="nama_div">
                                <input type="hidden" required class="form-control" value="<?php echo $d->no_div; ?>" name="no_div">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </div>
                        <?php } ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>