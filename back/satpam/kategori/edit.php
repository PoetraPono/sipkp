			<h2 align="center">Edit data kategori</h2>
			<hr>		
		<?php
			// terima data by id 
			$id= mysqli_real_escape_string($koneksi,$_GET['id']);

			// panggil data yang ingin di edit
			$panggil = mysqli_query($koneksi,"SELECT kategori,defin FROM kategori WHERE id_kategori='$id'");
			list($nama,$def)=mysqli_fetch_row($panggil);

		?>	
	<form class="form-horizontal" action="kategori/edit-proses.php" method="post">
		<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="nama" value="<?php echo $nama ; ?>" placeholder="nama kategori" class="form-control">
						</div>
						</div>
						<div class="form-group">
						<div class="col-md-2">
						<input type="text" name="def" value="<?php echo $def ; ?>" placeholder="definisi" class="form-control">
						</div>
						</div>
						<div class="form-group">
						<div class="col-md-2">
						<!-- mengirim id peta utk di edit -->
						<input type="hidden" value="<?php echo $$id; ?>" name="idkategori" >
						<input type="submit"  value="edit" class="btn btn-primary">
						</div>
						</div>
						</div>
	</form></center>