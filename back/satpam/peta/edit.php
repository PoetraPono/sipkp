			<h2 align="center">Edit data Peta</h2>
			<hr>		
		<?php
			// terima data by id 
			$id_peta = mysqli_real_escape_string($koneksi,$_GET['id']);

			// panggil data yang ingin di edit
			$panggil = mysqli_query($koneksi,"SELECT nama,alamat,latitude,longitude,data_target FROM peta WHERE id_peta='$id_peta'");
			list($nama,$alamat,$latitude,$longitude,$datatarget)=mysqli_fetch_row($panggil);

		?>	
	<form class="form-horizontal" action="peta/edit-proses.php" method="post">
		<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="nama" value="<?php echo $nama ; ?>" placeholder="nama tempat" class="form-control">
						</div>
						</div>
					
						<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="alamat" value="<?php echo $alamat ; ?>" placeholder="Alamat" class="form-control">
						</div>
						</div>
						
						<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="latitude" value="<?php echo $latitude ; ?>" placeholder="latitude" class="form-control">
						</div>
						</div>
						<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="longitude" value="<?php echo $longitude ; ?>" placeholder="longitude" class="form-control">
						</div>
						</div>
						<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="datatarget" value="<?php echo $datatarget ; ?>" placeholder="data target" class="form-control">
						</div>
						</div>
						<div class="form-group">
						<div class="col-md-2">
						<!-- mengirim id peta utk di edit -->
						<input type="hidden" value="<?php echo $id_peta ; ?>" name="idpeta" >
						<input type="submit"  value="edit"class="btn btn-primary">
						</div>
						</div>
	</form></center>