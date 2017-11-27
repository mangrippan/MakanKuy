<?php $this->load->view('Layout/Header');?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
<h2> Data Restoran</h2>

</div>
<div class="col-lg-2"> </div>
</div>
<br>
    <!-- /.row -->
        <div class="row">
            <p></p>
        </div>
    <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">

    <div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="tables">
    <thead style="background-color:RED;">
    <tr><th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telepon</th>
  		  <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
			<?php
			$no=1;
			foreach ($dataResto as $new) {
			?>

			<tr class="odd gradeX">
				<td><?php echo $no ?></td>
				<td><?php echo $new->nama ?></td>
				<td><?php echo $new->jalan ?></td>
				<td><?php echo $new->no_telp ?></td>
				<td>
					<a href="<?php echo site_url();?>Admin/infoResto" class="btn btn-primary" name="proses">Lihat Detail</a>
					<a href="<?php echo site_url();?>Admin/hapusResto/" class="btn btn-danger" name="hapus"> Hapus</i></a>
				</td>

		<?php $no=$no+1; } ?>
		</tbody>
	  </table>
    </div>

    </div>

    </div>

</div>
</div>


<?php $this->load->view('Layout/Footer');?>
