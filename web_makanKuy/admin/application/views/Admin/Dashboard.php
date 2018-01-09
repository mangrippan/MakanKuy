<?php $this->load->view('Layout/Header');?>
<?php $query=$this->db->select('*')->from('topup')->where('status',0)->get();$topup=$query->num_rows();?>
<?php $query=$this->db->select('*')->from('restoran')->where('status',0)->get();$resto_baru=$query->num_rows();?>
<div class="wrapper wrapper-content">
 <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">User</span>
                                <h5>Topup User</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $topup;?></h1>
                                <small>Verifikasi topup user</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Restoran</span>
                                <h5>Restoran Baru</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $resto_baru;?></h1>
                                <small>Verifikasi restoran baru</small>
                            </div>
                        </div>
                    </div>

        </div>
        </div>
<?php $this->load->view('Layout/Footer');?>
