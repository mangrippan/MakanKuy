<?php $this->load->view('Layout/Header');?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
<h2> Detail Restoran</h2>

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
			<?php foreach ($detailResto as $new) { ?>
					<tr class="odd gradeX">
						<th > Nama </th>
						<td ><?php echo $new->nama; ?></td>
					</tr>
					<tr class="odd gradeX">
						<th > Alamat </th>
						<td > <?php echo $new->jalan; echo ', '; echo $new->kecamatan; ?></td>
					</tr>
					<tr class="odd gradeX">
						<th > Detail Tempat </th>
						<td > <?php echo $new->detail_tempat; ?></td>
					</tr>
					<tr class="odd gradeX">
						<th > Nomor Telepon </th>
						<td > <?php echo $new->no_telp; ?> </td>
					</tr>
					<tr class="odd gradeX">
						<th > Rating </th>
						<td > <?php echo $new->rating; ?></td>
					</tr>
					<tr class="odd gradeX">
						<th > Kapasitas </th>
						<td > <?php echo $new->kapasitas;?> </td>
					</tr>
					<tr class="odd gradeX">
						<th > Jam Buka </th>
						<td > <?php echo $new->jam_buka;?> </td>
					</tr>
					<tr class="odd gradeX">
						<th > Jam Tutup </th>
						<td > <?php echo $new->jam_tutup;?> </td>
					</tr>
				<?php } ?>
	  </table>
    </div>

    </div>

    </div>

</div>
</div>


<?php $this->load->view('Layout/Footer');?>
