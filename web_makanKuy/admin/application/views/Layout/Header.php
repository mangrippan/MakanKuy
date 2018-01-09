<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Makan Kuy | Dashboard</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/images/icon.png');?>" />
	<link rel="stylesheet" type="text/css" media="all" href=" <?php echo base_url();?>asset/style.css" />
  <link rel="stylesheet" type="text/css" media="all" href=" <?php echo base_url();?>asset/popup.css"/>

</head>
<body>
<?php $query=$this->db->select('*')->from('topup')->where('status',0)->get();$topup=$query->num_rows();//baru?>
<?php $query=$this->db->select('*')->from('restoran')->where('status',0)->get();$resto_baru=$query->num_rows();//proses?>

<?php $totalLaporan= $topup+$resto_baru;?>
    <div id="wrapper">
       <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url();?>asset/images/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> <?php echo $this->session->userdata("admin")->nama; ?> </strong>
                             </span> <span class="text-muted text-xs block">Admin </span> </span> </a>

                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url();?>"><i class="fa fa-th-large"></i> <span class="nav-label">Beranda</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Management Restoran</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo site_url();?>Resto/dataResto">Data Restoran </a></li>
                        <li><a href="<?php echo site_url();?>Resto/verifikasiResto">Verifikasi Restoran<?php if ($resto_baru>0){?> <span class="label label-danger pull-right"><?php echo $resto_baru;?></span> <?php } ?></a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Management User</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo site_url();?>Topup/userTopup">Verifikasi  Pembayaran<?php if ($topup>0){?> <span class="label label-danger pull-right"><?php echo $topup;?></span> <?php } ?></a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
			<li><span class="m-r-sm text-muted welcome-message">Selamat Datang di Aplikasi Makan Kuy</span></li>
                <li>
                    <a href="<?php echo site_url();?>Admin/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
