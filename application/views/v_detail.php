<style type="text/css">
  .timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}
.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #c4c4c4;
  left: 50%;
  margin-left: -1.5px;
}
.timeline > li {
  margin-bottom: 20px;
  position: relative;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li > .timeline-panel {
  width: 46%;
  float: left;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-left: 15px solid #ccc;
  border-right: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}
.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #fff;
  border-right: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}
.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 50%;
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
}
.timeline > li.timeline-inverted > .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 15px;
  left: -15px;
  right: auto;
}
.timeline > li.timeline-inverted > .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-badge.primary {
  background-color: #2e6da4 !important;
}
.timeline-badge.success {
  background-color: #3f903f !important;
}
.timeline-badge.warning {
  background-color: #f0ad4e !important;
}
.timeline-badge.danger {
  background-color: #d9534f !important;
}
.timeline-badge.info {
  background-color: #5bc0de !important;
}
.timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}
.timeline-body > p + p {
  margin-top: 5px;
}


@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {
    width:70%;
    border:1px solid #bbb;
    margin-top: 30px;
}
.titleBox {
    background-color:#bbb;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:50px;
    text-align: center;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin-left:50px;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>


<div class="container-fluid">
  <div class="page-header">
      <h1 id="timeline">Timeline</h1>
  </div>
  <ul class="timeline">
    <?php foreach ($get as $tik) {?>
      <li>
        <div class="timeline-badge danger"><i class="glyphicon glyphicon-check"></i></div>
        <div class="timeline-panel">
          <div class="timeline-heading">
            <h4 class="timeline-title"><?php echo $tik->nama; ?></h4>
            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $tik->create_at; ?></small></p>
          </div>
          <div class="timeline-body">
            <p><?php echo $tik->masalah; ?></p>
          </div>
        </div>
      </li>
      <?php if ($tik->no_sts == 2) {?>
      <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
        <div class="timeline-panel">
          <div class="timeline-heading">
            <?php foreach ($usr as $usr) { ?>
            <h4 class="timeline-title"><?php echo $usr->updated_by; ?></h4>
            <?php } ?>
            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $tik->create_at; ?></small></p>
          </div>
          <div class="timeline-body">
            <p>Change status to <b>Progress</b></p>
          </div>
        </div>
      </li>
      <?php } elseif ($tik->no_sts == 3) {?>
        <li class="timeline-inverted">
        <div class="timeline-badge success"><i class="glyphicon glyphicon-credit-card"></i></div>
        <div class="timeline-panel">
          <div class="timeline-heading">
            <?php foreach ($usr as $user) { ?>
            <h4 class="timeline-title"><?php echo $user->nama; ?></h4>
            <?php } ?>
            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $tik->create_at; ?></small></p>
          </div>
          <div class="timeline-body">
            <p>Change status to <b>closed</b>, Problem solved</p>
          </div>
        </div>
      </li>
      <?php } ?>
    <?php } ?>
  </ul>

  <div class="row">
    <div class="col-md-9">
      <!-- DIRECT CHAT PRIMARY -->
      <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Direct Chat</h3>
          <div class="box-tools pull-right">
            <!-- <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span> -->
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
              <!-- <i class="fa fa-comments"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
            <?php foreach ($com as $comm) {
              if ($comm->id_user == 10) {
            ?>
            <div class="direct-chat-msg">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left"><?= $comm->nama; ?></span>
                <span class="direct-chat-timestamp pull-right"><?php echo $comm->created_at; ?></span>
              </div>
              <!-- /.direct-chat-info -->
              <div class="direct-chat-text">
                <?php echo $comm->com; ?>
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->

            <!-- Message to the right -->
            <?php } elseif ($comm->id_user !=10) {?>
            <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right"><?= $comm->nama ?></span>
                <span class="direct-chat-timestamp pull-left"><?php echo $comm->created_at; ?></span>
              </div>
              <!-- /.direct-chat-info -->
              <div class="direct-chat-text">
                <?php echo $comm->com; ?>
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
            <?php } ?>
            <?php } ?>
          </div>
          <!--/.direct-chat-messages-->
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <?= form_open_multipart('ticket/insertcomment') ?>
            <div class="input-group">
              <input type="text" name="komen" placeholder="Type Message ..." class="form-control">
              <input type="hidden" name="uri" value="<?php echo $this->uri->segment(3) ?>">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-primary btn-flat" name="comment" value="Send">
              </span>
            <?= form_close() ?>
            </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->
    </div>
  </div>
  <!-- <div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
    </div>
    <div class="actionBox">
      <?php foreach ($com as $comm) {
        if ($comm->id_user == 10) {
      ?>
        <ul class="commentList">
          <li>
              <div class="commenterImage">
                <?php foreach($usr as $user){?>
                  <img style="width: 30px; height: 30px" src="<?php echo $user->foto; ?>" />
                <?php } ?>
                <?php echo $comm->nama; ?>
              </div>
              <div class="commentText">
                <p class=""><?php echo $comm->com; ?><br>
                  <span class="date sub-text">
                    <?php echo $comm->created_at; ?>
                  </span>
              </p>
              </div>
          </li>
        </ul><hr>
      <?php } elseif ($comm->id_user !=10) {?>
        <ul class="commentList">
          <li>
            <div class="commenterImage">
              <?php foreach($usr as $user){?>
                <img style="width: 30px; height: 30px" src="<?php echo base_url().'upload/user/'.$user->foto; ?>" />
              <?php } ?>
              <?php echo $comm->nama; ?>
            </div>
            <div class="commentText">
              <p class=""><?php echo $comm->com; ?><br>
                <span class="date sub-text">
                  <?php echo $comm->created_at; ?>
                </span>
            </p>
            </div>
          </li>
        </ul><hr>
      <?php } ?>
      <?php } ?>
      <?= form_open_multipart('ticket/insertcomment', ['class' => 'form-inline', 'style' => 'width:500%']) ?>
        <div class="form-group">
            <input type="text" name="komen" style="border-color: #999" class="form-control" id="fname" placeholder="First Name Here">
            <input type="hidden" name="uri" value="<?php echo $this->uri->segment(3) ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-info" name="comment" value="Kirim">
        </div>
      <?= form_close() ?>
    </div>
  </div> -->
</div>