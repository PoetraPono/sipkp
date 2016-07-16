
<?php
	//terima id
	$id = $_GET['id'];
	//panggil data 
	$komentar=mysqli_query($koneksi,"SELECT nama,email,isi,website FROM komentar where id_komentar='$id'");

		list($nama,$email,$isi,$web)=mysqli_fetch_row($komentar);
?>
<h2>Edit Komentar</h2>
<hr>
<form class="form-horizontal" method="post" action="komentar/edit-proses.php">
	<div class="form-group">
			<div class="col-md-3">
			<input type="text"  name="nama" class="form-control" placeholder="nama" value="<?php echo $nama?>"required>
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="email"   name="email" class="form-control" value="<?php echo $email; ?>"placeholder="email">
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="text" name="web" class="form-control" value="<?php echo $web ?>"placeholder="web">
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-5">
			<textarea name="komentar" class="form-control" rows="5" cols="5" placeholder="komentar"><?php echo $isi ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-2">
		
		<input type="hidden" value="<?php echo $id ; ?>" name="id">

			<input type="submit" class="btn btn-primary" value="edit komentar"> 
		</div>
	</div>
	</form>
