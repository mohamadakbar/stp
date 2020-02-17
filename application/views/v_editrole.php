<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?= form_open('user/updaterole', ['class' => 'form-horizontal']) ?>
                    <div class="card-body">
                        <h4 class="card-title">Edit Akses</h4>
                        <?php foreach ($user as $usr) { ?>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required class="form-control" name="id_akses" value="<?php echo $usr->nama; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">No Akses</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required class="form-control" name="id_akses" value="<?php echo $usr->id_akses; ?>">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Akses</label>
                            <ul>
                                <?php foreach ($menu as $rl) {
                                    if ($rl->parent == 1) {
                                ?>
                                    <li>
                                        <input type="checkbox" name="check_list[]" alt="Checkbox" value="<?php echo $rl->id_menu; ?>" <?php foreach ($role as $ak) { if ($ak->id_menu == $rl->id_menu) { echo "checked"; } }
                                            ?>>
                                            <?php echo $rl->nama_menu; ?>
                                        <ul>
                                            <?php foreach ($menu as $cld) {
                                                if ($cld->child == $rl->id_menu) {
                                            ?>
                                                <li>
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" <?php foreach ($role as $aks) { if ($aks->id_menu == $cld->id_menu) { echo "checked"; } }?> value="<?php echo $cld->id_menu; ?>">
                                                    <?php echo $cld->nama_menu; ?>
                                                </li>
                                            <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div> 
                    <?php } ?>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <input type="submit" class="btn btn-info">
                        </div>
                    </div>
                </form>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>