<!DOCTYPE html>
<div id="content">
    <div class="inner" style="min-height: 700px;">
          <div class="row">
                <div class="col-lg-12">
                    <h1> Pengaturan Resto </h1>
                </div>
          </div>
          <hr />

    <div class="panel-body">
    <div class="row">
    <form class="form-horizontal" method="post" action="<?php echo site_url();?>Resto/set_resto">
      <div class="col-lg-12">
          <div class="form-group" >
              <label class="control-label col-lg-2">Username</label>
              <div class="col-lg-4">
                <input type="text" value="<?php echo $restoran->id_restoran;?>" disabled="disabled" class="form-control"  />
              </div>
          </div>

          <div class="form-group" >
              <label class="control-label col-lg-2">Kategori</label>

              <div class="col-lg-4">
                <input type="text" value="<?php echo $restoran->id_restoran;?>" disabled="disabled" class="form-control"  />
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Jalan</label>
              <div class="col-lg-4">
                  <input type="text" id="jalan" name="jalan" value="<?php echo $restoran->jalan?>" class="form-control" />
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Kecamatan</label>
              <div class="col-lg-4">
                  <input type="text" id="kec" name="kec" value="<?php echo $restoran->kecamatan?>" class="form-control" />
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Detail Tempat</label>
              <div class="col-lg-4">
                  <textarea class="form-control" rows="3" name="jalan" value="<?php echo $restoran->detail_tempat?>"> </textarea>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">No Telepon</label>
              <div class="col-lg-4">
                  <input type="text" id="telp" name="telp" value="<?php echo $restoran->no_telp?>" class="form-control" />
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Kapasitas</label>
              <div class="col-lg-4">
                      <input type="text" id="kap" name="kap" value="<?php echo $restoran->kapasitas?>" class="form-control" />
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Jam Buka</label>
              <div class="col-lg-4">
                  <input class="form-control timepicker-default" type="text" value="<?php echo $restoran->jam_buka?>">
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-lg-2">Jam Tutup</label>
              <div class="col-lg-4">
                  <input class="form-control timepicker-default" type="text" value="<?php echo $restoran->jam_tutup?>">
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-9" style="float:right;">
                  <input type="submit" value="Update" class="btn btn-success" >
              </div>
          </div>
      </div> <!--TUTUP DIV 12-->

    </form>

    </div>
  </div>
</div> <!--panel body-->


  </div> <!--div inner-->
</div>

<?php $this->load->view('Layout/Footer');?>
