<div class="row">
<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Menu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= form_open_multipart('managemenu/store');?>
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Menu</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="namamenu" required placeholder="Masukan nama menu">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Slug Menu</label>
          <input type="text" name="slug" class="form-control" id="exampleInputPassword1" required placeholder="Masukan slug menu">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Icon</label>
          <input type="text" name="icon" class="form-control" id="exampleInputPassword1" required placeholder="Masukan kode icon">
        </div>
        <div class="form-group">
          <label>Menu utama</label>
          <select required class="form-control" name="menuutama" id="satu">
            <option value="">-- Pilihan --</option>  
            <option value="1">Menu Utama</option>
            <option value="0">Submenu</option>
          </select>
        </div>
        <div class="form-group">
          <label>Submenu</label>
          <select required class="form-control" name="submenu" id="dua">
          <option value="0">-- Pilihan --</option>  
          <option value="1">Menu Utama</option>
            <?php foreach ($getmenu as $get) {?>
              <option value="<?= $get->id_menu ?>"><?= $get->nama_menu ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    <?= form_close(); ?>
  </div>
</div>
<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">List Menu </h3>
    </div>
    <div class="box-body">
    <div class="form-group">
      <ul>
        <?php foreach ($menu as $rl) {
            if ($rl->parent == 1) {
        ?>
            <li>
              <?php echo $rl->nama_menu; ?>&nbsp;&nbsp;<a data-toggle="modal" data-target="#modal-edit<?=$rl->id_menu;?>" class="btn btn-warning btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>
              <a class="btn btn-danger btn-xs" href="managemenu/delete/<?php echo $rl->id_menu ?>" onclick="return confirm('Yakin hapus data ini ??')">Hapus</a>
              <ul>
                <?php foreach ($menu as $cld) {
                  if ($cld->child == $rl->id_menu) {
                ?>
                  <li>
                  <?php echo $cld->nama_menu; ?>&nbsp;&nbsp;<a data-toggle="modal" data-target="#modal-edit<?=$cld->id_menu;?>" class="btn btn-warning btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>
                    <a class="btn btn-danger btn-xs" href="managemenu/delete/<?php echo $cld->id_menu ?>" onclick="return confirm('Yakin hapus data ini ??')">Hapus</a>
                  </li>
                <?php } ?>
                <?php } ?>
            </ul>
            </li>
        <?php } ?>
        <?php } ?>
    </ul>
    </div>

  </div>
</div>
<!--            MODAL              -->
<?php foreach($menu as $row){ ?>
<div class="row">
  <div id="modal-edit<?=$row->id_menu;?>" class="modal fade">
    <div class="modal-dialog">
      <?= form_open_multipart('managemenu/edit') ?>
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Menu</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" readonly value="<?=$row->id_menu;?>" name="id_menu" class="form-control" >
          <div class="form-group">
            <label class='col-md-3'>Nama menu</label>
            <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama_menu;?>" required placeholder="Masukkan Modal" class="form-control" ></div>
          </div><br><br>
          <div class="form-group">
            <label class='col-md-3'>Slug</label>
            <div class='col-md-9'><input type="text" name="slug" autocomplete="off" value="<?=$row->slug;?>" required placeholder="Masukkan Modal" class="form-control" ></div>
          </div><br><br>
          <div class="form-group">
            <label class='col-md-3'>Main menu</label>
            <div class='col-md-9'>
              <select required class="form-control" name="menuutama" id="satu">
                <option value="">-- Pilihan --</option>  
                <option value="1">Menu Utama</option>
                <option value="0">Submenu</option>
              </select>
            </div>
          </div><br><br>
          <!-- <div class="form-group">
            <label class='col-md-3'>Main menu</label>
            <div class='col-md-9'>
              <select required class="form-control" name="menu" id="satu">
                <option value="0">-- Pilihan --</option>
                <option value="1">Menu Utama</option>
                <?php foreach ($getmenu as $get) {?>
                  <option value="<?= $get->id_menu ?>"><?= $get->nama_menu ?></option>
                <?php } ?>
              </select>
            </div>
          </div><br><br> -->
          <div class="form-group">
          <label class='col-md-3'>Submenu</label>
          <div class='col-md-9'>
            <select required class="form-control" name="submenu" id="dua">
            <option value="0">-- Pilihan --</option>  
            <option value="1">Menu Utama</option>
              <?php foreach ($getmenu as $get) {?>
                <option value="<?= $get->id_menu ?>"><?= $get->nama_menu ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
<?php } ?>

<script>
  document.getElementById("satu").onchange = function () {
    if (this.value == '1'){
      document.getElementById("dua").value = 0;
    }else{
      document.getElementById("dua").removeAttribute("disabled");
    }
};
</script>