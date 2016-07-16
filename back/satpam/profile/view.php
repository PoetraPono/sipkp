<?php
	include('connect.php');
	$panggil = mysqli_query($koneksi,"SELECT id,username,password from user ");
	echo mysqli_error($koneksi);
	list($id,$user,$pass)=mysqli_fetch_row($panggil);

?>

<div class="media" id="paper">
<?php
			if(!empty($_GET['tambah']) && $_GET['tambah']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Posting !</h3></div>";
			 elseif (!empty($_GET['edit']) && $_GET['edit'] == 'success') 
			 	:
			echo "<div class=\"alert alert-success\">Berhasil Edit !</h3></div>";
			elseif (!empty($_GET['hapus']) && $_GET['hapus']=='success')
				:
			echo "<div class=\"alert alert-success\">Hapus berhasil!</h3></div>";
			endif;

		?>
	<div class="media-left media-middle">
		<a href="#">
			<img class="media-object" src="..." alt="...">
		</a>
	</div>
	<div class="media-body">
		<h3 class="media-heading">Your Profile</h4>
		<form  class="form-horizontal" action="profile/edit.php">
			<div class="form-group">
		<label class="col-sm-2 control-label">Username :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $username ?>"disabled>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Password :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="judul" placeholder="Judul" value="*****" disabled>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="index.php?btn=editprofile" class="btn btn-primary"> EDIT</a>
		</div>
	</div>
		</form>
	</div>

</div>