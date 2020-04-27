<?php if ($this->session->userdata('id')) {?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<?php foreach ($getuser as $get) { ?>
					<img class="profile-user-img img-responsive img-circle"
						src="<?php echo base_url('upload/user/') ?><?php echo $get->foto; ?>"
						alt="User profile picture">

					<h3 class="profile-username text-center"><?= $this->session->userdata('nama');?></h3>

					<p class="text-muted text-center">Software Engineer</p>


				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">About Me</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>
					<p class="text-muted"><?= $get->pendidikan;?></p>
					<!-- <hr> -->
					<strong><i class="fa fa-star margin-r-5"></i> Pangkat</strong>
					<p class="text-muted"><?= $get->pangkat;?></p>
					<!-- <hr> -->
					<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
					<p class="text-muted"><?= $get->alamat;?></p>
					<strong><i class="fa fa-university margin-r-5"></i> Jabatan Akademik</strong>
					<p class="text-muted"><?= $get->jab_akd;?></p>
					<strong><i class="fa fa-bookmark margin-r-5"></i> Jabatan Struktural</strong>
					<p class="text-muted"><?= $get->jab_str;?></p>
					<strong><i class="fa fa-certificate margin-r-5"></i> Sertifikat</strong>
					<p class="text-muted"><?= $get->peng_sert;?></p>
					<strong><i class="fa fa-trophy margin-r-5"></i> Penghargaan</strong>
					<p class="text-muted"><?= $get->peng_jabatan;?></p>
					<hr>

					<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

					<p>
						<span class="label label-danger">UI Design</span>
						<span class="label label-success">Coding</span>
						<span class="label label-info">Javascript</span>
						<span class="label label-warning">PHP</span>
						<span class="label label-primary">Node.js</span>
					</p>

					<hr>

					<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
					<!-- <button type="submit" class="btn btn-info">Edit</button> -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
					<li><a href="#pass" data-toggle="tab">Password</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<?php echo form_open_multipart('account/editprofil', array('class' => 'form-horizontal')); ?>
						<?php foreach ($user as $usr) {?>
						<div class="form-group">
							<label for="inputName" class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-5">
								<input type="text" required name='nama' class="form-control" id="inputName" placeholder="Name" value="<?= $get->nama; ?>">
								<input type="hidden" name='id_user' value="<?php echo $usr['id_user']; ?>">
							</div>
							<label  class="col-sm-1 control-label">No Tlp</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" required placeholder="No Tlp" value="<?= $get->no_tlp; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-1 control-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" required placeholder="Email" value="<?= $get->email; ?>">
							</div>
							<label for="inputName" class="col-sm-1 control-label">Divisi</label>
							<div class="col-sm-5">
                            <select required class="select2 form-control custom-select" name='div' style="width: 100%; height:36px;">
                                <option value="<?php echo $get->no_div; ?>"><?php echo $get->nama_div; ?></option>
                                <?php foreach ($divisi as $div) { ?>
                                    <option value="<?php echo $div->no_div; ?>"><?php echo $div->nama_div; ?></option>
                                <?php } ?>
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-1 control-label">Foto</label>
							<div class="col-sm-4">
								<input type="file" id="foto" name="foto">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php } ?>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane" id="pass"><br>
						<div class="col-sm-5">
							<h4>Change your password</h4>
						</div><br><br><br>
						<?php echo form_open_multipart('account/changePass', array('class' => 'form-horizontal')); ?>
						<!-- <div class="form-group">
							<label  class="col-sm-2 control-label">Current Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="current_pass" placeholder="Current Password">
							</div>
						</div> -->
						<div class="form-group">
							<label  class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="new_pass1" required minlength='6' placeholder="New Password">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">Repeat Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" required name="new_pass2" minlength='6' placeholder="Repeat Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
				</div>
				<?php echo form_open_multipart('account/editDetail', array('class' => 'form-horizontal')); ?>
				<div class="modal-body">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Nilai</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="ex">Pendidikan</label>
								<input class="form-control" type="text" value="<?= $get->pendidikan?>" name="pendidikan">
								<input class="form-control" readonly type="hidden" value="<?= $get->id_user?>" name="id_user">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Pangkat</label>
								<input class="form-control" type="text" value="<?php echo $get->pangkat?>" name="pangkat" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Alamat</label>
								<input class="form-control" type="text" value="<?php echo $get->alamat?>" name="alamat" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Jabatan Akademik</label>
								<input class="form-control" type="text" value="<?php echo $get->jab_akd?>" name="jab_akd" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Jabatan Struktural</label>
								<input class="form-control" type="text" value="<?php echo $get->jab_str?>" name="jab_str" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Sertifikat</label>
								<input class="form-control" type="text" value="<?php echo $get->peng_sert?>" name="peng_sert" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Penghargaan</label>
								<input class="form-control" type="text" value="<?php echo $get->peng_jabatan?>" name="peng_jabatan" style="text-transform:uppercase">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<?php } ?>
</section>
<?php }elseif ($this->session->userdata('nim')) {?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<?php foreach ($getmhs as $get) { ?>
					<img class="profile-user-img img-responsive img-circle"
						src="<?php echo base_url('upload/mhs/') ?><?php echo $get->foto; ?>"
						alt="User profile picture">

					<h3 class="profile-username text-center"><?= $this->session->userdata('nama');?></h3>
					<p class="text-muted text-center"><?php echo $get->tempat_lahir.', '.$get->tgl_lahir; ?></p>


				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">About Me</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Semester</strong>
					<p class="text-muted"><?= $get->semester;?></p>
					<!-- <hr> -->
					<strong><i class="fa fa-university margin-r-5"></i> Fakultas</strong>
					<p class="text-muted"><?= $get->nama_fakultas;?></p>
					<strong><i class="fa fa-star margin-r-5"></i> Kejuruan</strong>
					<p class="text-muted"><?= $get->nama_jurusan;?></p>
					<hr>

					<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

					<p>
						<span class="label label-danger">UI Design</span>
						<span class="label label-success">Coding</span>
						<span class="label label-info">Javascript</span>
						<span class="label label-warning">PHP</span>
						<span class="label label-primary">Node.js</span>
					</p>

					<hr>

					<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
					<!-- <button type="submit" class="btn btn-info">Edit</button> -->
					<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button> -->
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
					<li><a href="#pass" data-toggle="tab">Password</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<?php echo form_open_multipart('account/editprofilmhs', array('class' => 'form-horizontal')); ?>
						<div class="form-group">
							<label for="inputName" class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-5">
								<input type="text" required name='nama' class="form-control" id="inputName" placeholder="Name" value="<?= $get->nama_mahasiswa; ?>">
								<input type="hidden" name='nim' value="<?php echo $get->nim; ?>">
							</div>
							<label  class="col-sm-1 control-label">No Tlp</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" required name="no_tlp" placeholder="No Tlp" value="<?= $get->no_tlp; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-1 control-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" required placeholder="Email" name="email" value="<?= $get->email; ?>">
							</div>
							<label for="inputName" class="col-sm-1 control-label">Alamat</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" required placeholder="Email" name="alamat" value="<?= $get->alamat; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-1 control-label">Tanggal Lahir</label>
							<div class="col-sm-5">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" name="tgl_lahir" value="<?= $get->tgl_lahir; ?>" id="datepicker">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-1 control-label">Foto</label>
							<div class="col-sm-4">
								<input type="file" id="foto" name="foto">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane" id="pass"><br>
						<div class="col-sm-5">
							<h4>Change your password</h4>
						</div><br><br><br>
						<?php echo form_open_multipart('account/changePassMhs', array('class' => 'form-horizontal')); ?>
						<!-- <div class="form-group">
							<label  class="col-sm-2 control-label">Current Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="current_pass" placeholder="Current Password">
							</div>
						</div> -->
						<div class="form-group">
							<label  class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="new_pass1" required minlength='6' placeholder="New Password">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">Repeat Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" required name="new_pass2" minlength='6' placeholder="Repeat Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<?php } ?>
</section>
<?php }elseif($this->session->userdata('id_dosen')){?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<?php foreach ($getdosen as $get) { ?>
					<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/dosen/') ?><?php echo $get->foto; ?>" alt="User profile picture">
					<h3 class="profile-username text-center"><?= $this->session->userdata('nama_dosen');?></h3>
					<p class="text-muted text-center">Software Engineer</p>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">About Me</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>
					<p class="text-muted"><?= $get->pendidikan;?></p>
					<!-- <hr> -->
					<strong><i class="fa fa-star margin-r-5"></i> Pangkat</strong>
					<p class="text-muted"><?= $get->pangkat;?></p>
					<!-- <hr> -->
					<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
					<p class="text-muted"><?= $get->alamat;?></p>
					<strong><i class="fa fa-university margin-r-5"></i> Jabatan Akademik</strong>
					<p class="text-muted"><?= $get->jab_akd;?></p>
					<strong><i class="fa fa-bookmark margin-r-5"></i> Jabatan Struktural</strong>
					<p class="text-muted"><?= $get->jab_str;?></p>
					<strong><i class="fa fa-certificate margin-r-5"></i> Sertifikat</strong>
					<p class="text-muted"><?= $get->peng_sert;?></p>
					<strong><i class="fa fa-trophy margin-r-5"></i> Penghargaan</strong>
					<p class="text-muted"><?= $get->peng_jabatan;?></p>
					<hr>

					<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

					<p>
						<span class="label label-danger">UI Design</span>
						<span class="label label-success">Coding</span>
						<span class="label label-info">Javascript</span>
						<span class="label label-warning">PHP</span>
						<span class="label label-primary">Node.js</span>
					</p>

					<hr>

					<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
					<!-- <button type="submit" class="btn btn-info">Edit</button> -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
					<li><a href="#pass" data-toggle="tab">Password</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<?php echo form_open_multipart('account/editprofildosen', array('class' => 'form-horizontal')); ?>
						<?php foreach ($user as $usr) {?>
						<div class="form-group">
							<label for="inputName" class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-5">
								<input type="text" required name='nama' class="form-control" id="inputName" placeholder="Name" value="<?= $get->nama_dosen; ?>">
								<input type="hidden" name='id_dosen' value="<?php echo $usr['id_dosen']; ?>">
							</div>
							<label  class="col-sm-1 control-label">No Tlp</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" required placeholder="No Tlp" name="no_tlp" value="<?= $get->no_tlp; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-1 control-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" required placeholder="Email" name="email" value="<?= $get->email; ?>">
							</div>
							<label for="inputName" class="col-sm-1 control-label">Tempat Lahir</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" required placeholder="Tempat Lahir" name="tempat_lahir" value="<?= $get->tempat_lahir; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-1 control-label">Tanggal Lahir</label>
							<div class="col-sm-5">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" name="tgl_lahir" value="<?= $get->tgl_lahir; ?>" id="datepicker">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-1 control-label">Foto</label>
							<div class="col-sm-4">
								<input type="file" id="foto" name="foto">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php } ?>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane" id="pass"><br>
						<div class="col-sm-5">
							<h4>Change your password</h4>
						</div><br><br><br>
						<?php echo form_open_multipart('account/changePassDosen', array('class' => 'form-horizontal')); ?>
						<!-- <div class="form-group">
							<label  class="col-sm-2 control-label">Current Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="current_pass" placeholder="Current Password">
							</div>
						</div> -->
						<div class="form-group">
							<label  class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="new_pass1" required minlength='6' placeholder="New Password">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">Repeat Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" required name="new_pass2" minlength='6' placeholder="Repeat Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
				</div>
				<?php echo form_open_multipart('account/editDetailDosen', array('class' => 'form-horizontal')); ?>
				<div class="modal-body">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Nilai</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="ex">Pendidikan</label>
								<input class="form-control" type="text" value="<?= $get->pendidikan?>" name="pendidikan">
								<input class="form-control" readonly type="hidden" value="<?= $get->id_dosen?>" name="id_dosen">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Pangkat</label>
								<input class="form-control" type="text" value="<?php echo $get->pangkat?>" name="pangkat" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Alamat</label>
								<input class="form-control" type="text" value="<?php echo $get->alamat?>" name="alamat" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Jabatan Akademik</label>
								<input class="form-control" type="text" value="<?php echo $get->jab_akd?>" name="jab_akd" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Jabatan Struktural</label>
								<input class="form-control" type="text" value="<?php echo $get->jab_str?>" name="jab_str" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Sertifikat</label>
								<input class="form-control" type="text" value="<?php echo $get->peng_sert?>" name="peng_sert" style="text-transform:uppercase">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Penghargaan</label>
								<input class="form-control" type="text" value="<?php echo $get->peng_jabatan?>" name="peng_jabatan" style="text-transform:uppercase">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<?php } ?>
</section>
<?php } ?>


<?php echo $this->session->flashdata('message'); ?>
<?php echo $this->session->flashdata('message1'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$(function () {
		$(".hide-it").delay(2000).fadeOut(900);
	});

</script>
