<section class="content">
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
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
					<strong><i class="fa fa-book margin-r-5"></i> Education</strong>

					<p class="text-muted">
						<?= $get->nama;?>
					</p>

					<hr>

					<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

					<p class="text-muted"><?= $get->email;?></p>

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
				</ul>

				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<?php echo form_open_multipart('account/editprofil', array('class' => 'form-horizontal')); ?>
						<?php foreach ($user as $usr) {?>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-6">
								<input type="text" required name='nama' class="form-control" id="inputName" placeholder="Name" value="<?= $get->nama; ?>">
								<input type="hidden" name='id_user' value="<?php echo $usr['id_user']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-6">
								<input type="email" class="form-control" id="inputEmail" placeholder="Email" readonly value="<?= $get->email; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Division</label>

							<div class="col-sm-6">
                            <select required class="select2 form-control custom-select" name='div' style="width: 100%; height:36px;">
                                <option value="">Select</option>
                                <?php foreach ($divisi as $div) { ?>
                                    <option value="<?php echo $div->no_div; ?>"><?php echo $div->nama_div; ?></option>
                                <?php } ?>
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Experience</label>

							<div class="col-sm-6">
								<textarea class="form-control" id="inputExperience" placeholder="Experience"
									readonly><?= $get->nama; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Profile Picture</label>

							<div class="col-sm-6">
								<input type="file" name="foto">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<div class="checkbox">
									<label>
										<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-info">Submit</button>
							</div>
						</div>
						<?php } ?>
						<?php echo form_close(); ?>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<?php } ?>
</section>
