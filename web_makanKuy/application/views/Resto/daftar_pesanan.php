<!DOCTYPE html>
<div id="content">
  <div class="inner">
      <div class="row">
          <div class="col-lg-12">
                <h2> Konfirmasi Pemesanan Tempat </h2>
          </div>
      </div>
      <hr />
      <div class="row">
          <div class="col-lg-12">
          <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hov" id="dataPemesanan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama</th>
                        <th>Jumlah Pemesanan</th>
                        <th>Jumlah Deposit</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach ($pemesanan as $new) {
                 ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no;?></td>
                        <td><?php echo $new->tanggal_pesan?></td>
                        <td><?php echo $new->id_konsumen?></td>
                        <td class="center"><?php echo $new->jumlah_pesan?></td>
                        <td class="center"><?php echo $new->deposit?></td>
                        <td class="center">
                            <a href="<?php echo base_url();?>Pemesanan/confirm_pesan/<?php echo $new->id_konsumen."/".$new->id_restoran."/".$new->tanggal_pesan;?>" class="btn btn-success btn-flat">Konfirmasi</a>
                            <a href="<?php echo base_url();?>Pemesanan/del_Pesan/" class="btn btn-danger btn-flat">Delete</a>
                        </td>
                    </tr>
                    <?php $no=$no+1; } ?>
                </tbody>
              </table>
          </div>
          </div>
          </div>
        </div>
      </div> <!--div row-->
   </div><!-- div inner-->
</div><!-- div content-->
<?php $this->load->view('Layout/Footer');?>
