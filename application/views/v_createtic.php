<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" method="post" action="<?php echo base_url('ticket/insert'); ?>">
                    <div class="card-body">
                        <h4 class="card-title">Laporan Kerusakan</h4>
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
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Masalah</label>
                            <div class="col-sm-8">
                                <!-- <input class="col-sm-12" style="height: 300px" id="editor" type="text" name="masalah" value="" placeholder> -->
                                <textarea required class="col-sm-12" style="height: 300px" name="masalah" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <input type="submit" class="btn btn-info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>