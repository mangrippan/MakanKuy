<!DOCTYPE html>
<div id="content">
    <div class="inner" style="min-height: 700px;">
          <div class="row">
                <div class="col-lg-12">
                    <h1> Pengaturan Akun </h1>
                </div>
          </div>
          <hr />

    <div class="panel-body">
    <div class="row">

    <form class="form-horizontal" method="post" action="<?php echo site_url();?>Resto/set_akun">
      <div class="form-group" >
          <label class="control-label col-lg-2">Username</label>

          <div class="col-lg-4">
            <input type="text" value="<?php echo $restoran->id_restoran;?>" disabled="disabled" class="form-control"  />
            <input type="hidden" name="username" value="<?php echo $restoran->id_restoran;?>" class="form-control"  />
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-lg-2">Nama Restoran</label>

          <div class="col-lg-4">
              <input type="text" id="nama" name="nama" value="<?php echo $restoran->nama?>" class="form-control" />
          </div>
      </div>

      <div class="form-group">
          <label for="password" class="control-label col-lg-2">Password</label>

          <div class="col-lg-4">
              <input class="form-control" type="password" value="<?php echo $restoran->password?>" id="password" name="password" data-placement="top"/>
          </div>
      </div>

      <div class="form-group" >
          <div class="col-lg-9" style="float:right;">
              <input type="submit" value="Update" class="btn btn-success" >
          </div>
      </div>
    </form>
    </div>
  </div>
</div>

  </div> <!--div inner-->
</div>

<?php $this->load->view('Layout/Footer');?>
