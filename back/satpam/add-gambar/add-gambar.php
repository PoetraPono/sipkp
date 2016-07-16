<title>Tambah Artikel</title>
<h3 align="center" id="title">Tambah Artikel</h3>
<hr>
<form class="form-horizontal" method="post" action="add/add-proses.php" enctype="multipart/form-data">


	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Kategori :</label>
		<div class="col-sm-2">
			<select class="form-control" name="id_artikel">
			<?php
				$data = mysqli_query($koneksi,"SELECT id_artikel,judul From artikel");

				while(list($id_artikel,$judul)=mysqli_fetch_row($data))
					:
			?>
				<option value="<?php echo $id_artikel ;?>"><?php echo $judul ;?></option>
			<?php endwhile;?>

			</select>
		</div>
	</div>
<div class="form-group">
		<label class="col-sm-2 control-label">Nama gambar :</label>
		<div class="col-sm-3">
			<input type="text"  value="" name="namagambar" class="form-control">
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
				<option value="0">0</option>
				<option value="1">1</option>

			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-primary" value="Tambah"> 
		</div>
	</div>
	</form>
