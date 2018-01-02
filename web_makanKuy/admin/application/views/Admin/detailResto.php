<div class="popup-wrapper" id="popup">
	<div class="popup-container">
		<h2> Detail Restoran</h2> 	<br/>
			<!--
			<div class="frame">
			<img class="image" style="width:25%; height:50%; float:left;" src="img/<?php echo $profil->foto;?>"></img>
			</div>
		-->
			<div style="float:right; width:75%;">
				<table align="right" cellpadding="3" style="width:100%; text-align:left; float:left;" class="popup-table">
				<?php
					foreach ($detailResto as $new) {
						//}
				?>
					<tr>
						<th > Nama </th>
						<td ><?php echo $new->nama; ?></td>
					</tr>
					<tr>
						<th > Jalan </th>
						<td > <?php echo $new->jalan; ?></td>
					</tr>
					<tr>
						<th > Detail Tempat </th>
						<td > <?php echo $new->detail_tempat; ?></td>
					</tr>
					<tr>
						<th > No Telpon </th>
						<td > <?php echo $new->no_telp; ?> </td>
					</tr>
					<tr>
						<th > Rating </th>
						<td > <?php echo $new->rating; ?></td>
					</tr>
					<tr>
						<th > Kapasitas </th>
						<td > <?php echo $new->kapasitas; //}?> </td>
					</tr>
				<?php } ?>
				</table>
			</div>

			<a class="popup-close" href="#closed">X</a>
	</div>
</div>
