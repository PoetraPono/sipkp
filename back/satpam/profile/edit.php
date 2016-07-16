<?php
	include('connect.php');
	$panggil = mysqli_query($koneksi,"SELECT id,username,password from user ");
	echo mysqli_error($koneksi);
	list($id,$user,$pass)=mysqli_fetch_row($panggil);

?>
<div class="media" id="paper">
	<div class="media-left media-middle">
		<a href="#">
			<img class="media-object" src="..." alt="...">
		</a>
	</div>
	<div class="media-body">
		<h3 class="media-heading">Edit your account</h4>
		<form  class="form-horizontal" action="profile/edit-proses.php" method="post">
			<div class="form-group">
		<label class="col-sm-2 control-label">Username :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username ?>" requiered>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Password :</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" name="password" placeholder="password" value="" requrired>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="hidden" class="btn btn-primary" name="id" value="<?php echo $id ;?>"> 

			<input type="submit" class="btn btn-primary" value="EDIT"> 
		</div>
	</div>
		</form>
	</div>

</div>