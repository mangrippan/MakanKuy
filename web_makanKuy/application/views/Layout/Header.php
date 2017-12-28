<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Admin Resto </title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-min.png');?>" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
	  <meta content="" name="author" />
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="<?php echo base_url();?>assets/css/layout2.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/timeline/timeline.css" rel="stylesheet" />

    <!-- FORM-->
    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/chosen/chosen.min.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
    <link rel="<?php echo base_url();?>stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />

</head>
<!-- END HEAD -->
<?php
  $id=$this->session->userdata("resto")->id_restoran;
?>
<!-- BEGIN BODY -->
<body class="padTop53 " >
    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        <!-- HEADER SECTION -->
        <div id="top">
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <class="navbar-brand">
						         <!--  <img src="<?php echo base_url();?>assets/img/logo-min.png" /> -->
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
   			        <!--LOGOUT SETTING -->
                  <li> <a href="<?php echo site_url();?>Resto/logout"><i class="icon-signout"></i> Logout </a> </li>
                <!--END LOGOUT SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->

        <!-- MENU LEFT SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url();?>assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $this->session->userdata("resto")->nama; ?></h5>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li class="panel">
                    <a href="<?php echo base_url();?>Resto/dashboard" >
                        <i class="icon-home"></i> Dashboard
                    </a>
                </li>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-food"> </i> Menu

                    </a>
                </li>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pemesanan">
                        <i class="icon-tasks"> </i> Pemesanan
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="pemesanan">
                        <li class=""><a href="<?php echo base_url();?>Resto/booking/<?php echo $id;?>"><i class="icon-angle-right"> </i> Data
                          &nbsp; <span class="label label-primary"><?php echo $data_pesan; ?></span>&nbsp; </a>
                        </a></li>
                        <li class=""><a href="<?php echo base_url();?>Resto/pemesanan/<?php echo $id;?>"><i class="icon-angle-right"></i> Konfirmasi
                          &nbsp; <span class="label label-danger"><?php echo $jml_pesan; ?></span>&nbsp; </a>
                        </li>
                    </ul>
                </li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-pencil"></i> Pengaturan

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
					          </a>
                    <ul class="collapse" id="pagesr-nav">
                        <li><a href="<?php echo base_url();?>Resto/setting_akun/<?php echo $id?>"><i class="icon-angle-right"></i> Akun </a></li>
                        <li><a href="<?php echo base_url();?>Resto/setting_resto/<?php echo $id?>"><i class="icon-angle-right"></i> Restoran </a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!--END MENU SECTION -->
