
<title>Add Gambar</title>
<h2 align="center" id="title">Add Gambar</h2>

<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Add data</button>
<hr>
<!-- Modal -->


<?php
			if(!empty($_GET['add']) && $_GET['add']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Input gambar !</h3></div>";
			elseif(!empty($_GET['edit']) && $_GET['edit']=='success')
				:
			echo "<div class=\"alert alert-success\"> Edit Data !</h3></div>";
			elseif (!empty($_GET['hapus']) && $_GET['hapus']=='success')
				:
			echo "<div class=\"alert alert-success\">Hapus berhasil!</h3></div>";
			endif;

		?>
<form action="add-gambar/add-gambar-proses.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Input Data Gambar</h4>
			</div>
			<!-- modal body -->
			<div class="modal-body">
			<p>
			<p>Judul Artikel</p>
						<select class="form-control" name="id_artikel">
						<?php
							$data = mysqli_query($koneksi,"SELECT id_artikel,judul From artikel");

							while(list($id_artikel,$judul)=mysqli_fetch_row($data))
								:
						?>
							<option value="<?php echo $id_artikel ;?>"><?php echo $judul ;?></option>
						<?php endwhile;?>

						</select>
				</p>	
				<p>
						<input type="text"  value="" name="namagambar" class="form-control" placeholder="Nama Gambar">
				</p>
						<input type="file"   name="gambar">
				</p>
		
				<p>
						<select name="active" class="form-control">
							<option value="0">0</option>
							<option value="1">1</option>

						</select>
				</p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" value="input">

			</div>
		</div>
	</div>
</div>
</form>
<div class="table-responsive" id="paper">

<table class="table table-hover table-stripped">
<tr class="info">
	<th>No</th>
	<th>Nama Artikel</th>	
	<th>Nama gambar</th>
	<th>ACTION</th>	
<?php 
	// panggil data peta
	$no=1;
	$panggil=mysqli_query($koneksi,"SELECT id_gambar,id_artikel,nama_gambar FROM gambar ORDER by id_artikel ");
	while(
		list($id_gambar,$id_artikel,$nama_gambar)=mysqli_fetch_row($panggil)
		)
		:
		$judul=mysqli_query($koneksi,"SELECT judul FROM artikel Where id_artikel='$id_artikel'");
		list($judul)=mysqli_fetch_row($judul);

?>

</tr>
		<td><?php echo $no++ ; ?></td>
		<td><?php echo $judul ; ?></td>
		<td><?php echo $nama_gambar ; ?></td>
		
		<td><a href="index.php?btn=editgambar&id=<?php echo $id_gambar; ?>" class="glyphicon glyphicon-pencil"></a> | <a href="index.php?btn=hapusgambar&id=<?php echo $id_gambar; ?>" 
		onclick="javascript: return confirm('hapus gambar?')"class="glyphicon glyphicon-trash"></a></td>
</tr>
<?php endwhile;?>

</table>
</div>

</div>