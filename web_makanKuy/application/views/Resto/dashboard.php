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
                  <span class="label label-warning"><?php echo $restoran[0]->rating;?></span>
              </a>
              <a class="quick-btn" href="#">
                  <i class="icon-th-large icon-2x"></i>
                  <span>Kapasitas</span>
                  <?php $booking=$pemesanan[0]->booking;
                        $kap=$restoran[0]->kapasitas;
                        $sisa=$kap-$booking;
                        if($sisa<0) $sisa=0;
                  ?>
                  <span class="label label-success"><?php echo $sisa ?></span>
              </a>
          </div>
      </div>
    </div>
    <!--END BLOCK SECTION -->
    <hr />

  </div><!--inner-->
</div><!--content-->

</div>
        <!--END PAGE CONTENT -->

    <!--END MAIN WRAPPER -->
<?php $this->load->view('Layout/Footer');?>
