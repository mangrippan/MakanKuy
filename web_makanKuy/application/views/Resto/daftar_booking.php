<!DOCTYPE html>
<div id="content">
  <div class="inner">
      <div class="row">
          <div class="col-lg-12">
                <h2> Data Pemesanan Tempat </h2>
          </div>
      </div>
      <hr />
      <div class="row">
          <div class="col-lg-12">
          <div class="panel panel-default">
          <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hove" id="dataPemesanan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama</th>
                        <th>Jumlah Pemesanan</th>
                        <th>Jumlah Deposit</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach ($booking as $new) {
                 ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no;?></td>
                        <td><?php echo $new->tanggal_pesan?></td>
                        <td><?php echo $new->id_konsumen?></td>
                        <td class="center"><?php echo $new->jumlah_pesan?></td>
                        <td class="center"><?php echo $new->deposit?></td>
                        <td class="center">
                            <a href="<?php echo base_url();?>Pemesanan/selesai_pesan/<?php echo $new->id_konsumen."/".$new->id_restoran."/".$new->tanggal_pesan;?>" class="btn btn-success btn-flat">Selesai</a>
                        </td>
                    </tr>
                    <?php $no=$no+1; } ?>
                <tbody>
              </table>
          </div>
          </div>
          </div>
          </div>
        </div>
      </div> <!--div row-->
   </div><!-- div inner-->
</div><!-- div content-->
<?php $this->load->view('Layout/Footer');?>
