
<title>Data kategori</title>
<h2 align="center" id="title">Data kategori</h2>

<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Add data</button>
<hr>
<!-- Modal -->


<?php
			if(!empty($_GET['tambah']) && $_GET['tambah']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Input Kategori!</h3></div>";
			elseif(!empty($_GET['edit']) && $_GET['edit']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Edit Kategori !</h3></div>";
			elseif (!empty($_GET['hapus']) && $_GET['hapus']=='success')
				:
			echo "<div class=\"alert alert-success\">Hapus berhasil!</h3></div>";
			endif;

		?>
<form action="kategori/input-proses.php" method="post">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Input Data kategori</h4>
			</div>
			<!-- modal body -->
			<div class="modal-body">
			
						<input type="text" name="nama" value="" placeholder="nama Kategori" class="form-control">
						<br>
						<input type="text" name="def" value="" placeholder="definisi" class="form-control">

						
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
	<th>Kategori</th>	
	<th>ACTION</th>	
<?php 
	// panggil data peta
	$no=1;
	$panggil=mysqli_query($koneksi,"SELECT id_kategori,Kategori FROM Kategori ORDER by id_kategori ");
	while(
		list($id,$nama)=mysqli_fetch_row($panggil)
		)
		:

?>

</tr>
		<td><?php echo $no++ ; ?></td>
		<td><?php echo $nama ; ?></td>
		<td><a href="index.php?btn=editkategori&id=<?php echo $id; ?>" class="glyphicon glyphicon-pencil"></a> | <a href="index.php?btn=hapuskategori&id=<?php echo $id; ?>" 
		onclick="javascript: return confirm('hapus kategori?')"class="glyphicon glyphicon-trash"></a></td>
</tr>
<?php endwhile;?>

</table>
</div>

</div>