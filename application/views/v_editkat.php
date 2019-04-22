<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <?php echo form_open_multipart("kategori/update"); ?>
                    <div class="card-body">
                        <h4 class="card-title">Edit Kategori</h4>
                        <?php foreach ($kat as $k) { ?>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Kategori</label>
                            <div class="col-sm-6 ">
                                <input type="text" required class="form-control" value="<?php echo $k->nama_kat;?>" name="nama_kat">
                                <input type="hidden" required class="form-control" value="<?php echo $k->no_kat; ?>" name="no_kat">
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