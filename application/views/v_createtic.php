<div class="row">
        <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Laporan Kerusakan</h3><br><br>
            </div>
        <!-- /.box-header -->
        <!-- form start -->
            <?= form_open_multipart('ticket/insert', ['class' => 'form_horizontal']);?><br><br>
                <div class="box-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">No Ticket</label>
                        <div class="col-sm-8">
                            <input type="text" readonly required class="form-control" name="no_tiket" value="<?php echo $kode; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" readonly required class="form-control" placeholder="Nama" name="nama" value="<?php echo $this->session->userdata('nama'); ?>">
                            <input type="hidden" name="iduser" value="<?php echo $this->session->userdata('id'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="div" class="col-sm-2 text-right control-label col-form-label">Divisi</label>
                        <div class="col-sm-8">
                            <?php foreach ($div as $d) {?>
                                <input type="text" readonly required class="form-control" name="div" value="<?php echo $d->nama_div;?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="div" class="col-sm-2 text-right control-label col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="select2 form-control custom-select" name="kat" required style="width: 100%; height:36px;">
                                <option value="">Select</option>
                                <?php foreach ($kat as $k) {?>
                                <option value="<?php echo $k->no_kat;?>"><?php echo $k->nama_kat;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Masalah</label>
                    <div class="box-body pad col-md-8">
                        <form>
                            <textarea id="editor1" name="masalah" rows="10" cols="80"></textarea>
                        </form>
                        <br>
                        <input type="submit" value="Send" class="btn btn-info">
                    </div>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
