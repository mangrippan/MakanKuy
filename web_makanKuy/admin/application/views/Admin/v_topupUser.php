<?php $this->load->view('Layout/Header');?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
<h2> Verifikasi Top Up User</h2>

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
        <th>Tanggal</th>
        <th>Jumlah Top up</th>
        <th>Bukti Pembayaran</th>
		<th>Status</th>
		<th>Verifikasi Pembayaran</th>
    </tr>
    </thead>
    <tbody>
			<?php
			$no=1;
			foreach ($userTopup as $new) {
			?>

			<tr class="odd gradeX">
				<td><?php echo $no ?></td>
				<td><?php echo $new->id_konsumen ?></td>
				<td><?php echo $new->tanggal_topup ?></td>
				<td><?php echo $new->jumlah_topup ?></td>
				<td><?php echo $new->bukti ?></td>
				<td><?php echo $new->status ?></td>
				<td>
					<a href="<?php echo site_url();?>Admin/updateSaldo/<?php echo $new->id_konsumen."/".$new->jumlah_topup."/".$new->tanggal_topup;?>" class="btn btn-primary" name="proses">Proses</a>
					<a href="<?php echo site_url();?>Admin/hapusTopup/<?php echo $new->id_konsumen."/".$new->tanggal_topup;?>" class="btn btn-danger" name="hapus"> Hapus</i></a>
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
