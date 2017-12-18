<!DOCTYPE html>
<div id="content">
    <div class="inner" style="min-height: 700px;">
          <div class="row">
                <div class="col-lg-12">
                    <h1> Dashboard </h1>
                </div>
          </div>
          <hr />
   <!--BLOCK SECTION -->
   <div class="row">
      <div class="col-lg-12">
          <div style="text-align: center;">
              <a class="quick-btn" href="<?php echo base_url();?>Resto/pemesanan/<?php echo $this->session->userdata("resto")->id_restoran;?>">
                  <i class="icon-bell icon-2x"></i>
                  <span>Pemesanan</span>
                  <span class="label label-danger"><?php echo $jml_pesan; ?></span>
              </a>
              <a class="quick-btn" href="#">
                  <i class="icon-star icon-2x"></i>
                  <span>Rating</span>
                  <span class="label label-warning"><?php $rate=$this->session->userdata("resto")->rating; echo$rate;?></span>
              </a>
              <a class="quick-btn" href="#">
                  <i class="icon-th-large icon-2x"></i>
                  <span>Kapasitas</span>
                  <span class="label label-success">+25</span>
              </a>
          </div>
      </div>
    </div>
    <!--END BLOCK SECTION -->
    <hr />
    <!-- COMMENT AND NOTIFICATION  SECTION -->
    <div class="row">
        <div class="col-lg-7">
            <div class="chat-panel panel panel-success">
                <div class="panel-heading">
                    <i class="icon-comments"></i>
                        New Comments
                </div>
                <div class="panel-body">
                    <ul class="chat">
                    <li class="left clearfix">
                          <span class="chat-img pull-left">
                                <img src="<?php echo base_url();?>assets/img/1.png" alt="User Avatar" class="img-circle" />
                          </span>
                          <div class="chat-body clearfix">
                              <div class="header">
                                  <strong class="primary-font "> Jack Sparrow </strong>
                                  <small class="pull-right text-muted label label-danger">
                                      <i class="icon-time"></i> 12 mins ago
                                  </small>
                              </div>
                              <br />
                              <p>
                                Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                              </p>
                          </div>
                    </li>
                    <li class="right clearfix">
                          <span class="chat-img pull-right">
                                  <img src="<?php echo base_url();?>assets/img/2.png" alt="User Avatar" class="img-circle" />
                          </span>
                          <div class="chat-body clearfix">
                              <div class="header">
                                  <small class=" text-muted label label-info">
                                        <i class="icon-time"></i> 13 mins ago</small>
                                  <strong class="pull-right primary-font"> Jhony Deen</strong>
                              </div>
                              <br />
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                              </p>
                          </div>
                     </li>
                  </ul>
                </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your comment here..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" id="btn-chat">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="col-lg-5">

                       <div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Notifications Alerts Panel
                            </div>

                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <i class=" icon-comment"></i> New Comment
                                    <span class="pull-right text-muted small"><em> 4 minutes ago</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="icon-twitter"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em> 12 minutes ago</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="icon-envelope"></i> Message Sent
                                    <span class="pull-right text-muted small"><em> 27 minutes ago</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="icon-tasks"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="icon-upload"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="icon-warning-sign"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                    </a>
                                </div>

                                <a href="#" class="btn btn-default btn-block btn-primary">View All Alerts</a>
                            </div>

                        </div>
                    </div>
                    <!-- END COMMENT AND NOTIFICATION  SECTION -->
                </div>
            </div>

        </div>
        <!--END PAGE CONTENT -->


    </div>

    <!--END MAIN WRAPPER -->
<?php $this->load->view('Layout/Footer');?>
