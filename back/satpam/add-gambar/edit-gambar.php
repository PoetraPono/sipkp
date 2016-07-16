<title>Tambah Artikel</title>
<h3 align="center" id="title">E</h3>
<hr>
<?php
	$id_gambar=mysqli_real_escape_string($koneksi,$_GET['id']);
	$data=mysqli_query($koneksi,"SELECT nama_gambar,id_artikel,active FROM gambar WHERE id_gambar='$id_gambar'");
	list($nama_gambar,$id_artikel_gambar,$active_data)=mysqli_fetch_row($data); ?>
<form class="form-horizontal" method="post" action="add-gambar/edit-gambar-proses.php" enctype="multipart/form-data">


	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Kategori :</label>
		<div class="col-sm-2">
			<select class="form-control" name="id_artikel">
			<?php
				$data = mysqli_query($koneksi,"SELECT id_artikel,judul From artikel");

				while(list($id_artikel,$judul)=mysqli_fetch_row($data))
					:
			?>
				<option value="<?php echo $id_artikel ;?>" <?php if($id_artikel==$id_artikel_gambar) : 
				echo "selected" ; endif; ?>><?php echo $judul ;?></option>
			<?php endwhile;?>

			</select>
		</div>
	</div>
<div class="form-group">
		<label class="col-sm-2 control-label">Nama gambar :</label>
		<div class="col-sm-3">
			<input type="text"  value="<?php echo $nama_gambar ;?>" name="namagambar" class="form-control">
			<input type="hidden"  value="<?php echo $nama_gambar ;?>" name="namasebelum" class="form-control">

		</div>
</div>
<div class="form-group">
		<label class="col-sm-2 control-label">upload :</label>
		<div class="col-sm-3">
			<input type="file"   name="gambar">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Active :</label>
		<div class="col-sm-1">
			<select name="active" class="form-control">
			
				
				<option value="0" <?php if($active_data==0) : echo "selected"; endif;?>>0</option>
				<option value="1" <?php if($active_data==1) : echo "selected"; endif;?>>1</option>

				

			</select>
	

		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="hidden" class="btn btn-primary" value="<?php echo $id_gambar;?>" name="id_gambar"> 

			<input type="submit" class="btn btn-primary" value="Tambah"> 
		</div>
	</div>
	</form>
