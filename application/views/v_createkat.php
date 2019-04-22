<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <?php echo form_open_multipart("kategori/create"); ?>
                    <div class="card-body">
                        <h4 class="card-title">Tambah Kategori</h4>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Kategori</label>
                            <div class="col-sm-6 ">
                                <input type="text" required class="form-control" placeholder="Masukan Nama" name="nama_kat">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>