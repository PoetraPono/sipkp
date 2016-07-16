<?php
	$tanggal=date("Y-m-d");
?>
<title>Tambah Artikel</title>
<h3 align="center" id="title">Tambah Artikel</h3>
<hr>
					

<form class="form-horizontal" method="post" action="add/add-proses.php" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-2 control-label">Judul :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="judul" placeholder="Judul" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Kategori :</label>
		<div class="col-sm-2">
			<select class="form-control" name="kategori">
			<?php
				$data = mysqli_query($koneksi,"SELECT id_kategori,kategori From kategori");

				while(list($idkategori,$kategori)=mysqli_fetch_row($data))
					:
			?>
				<option value="<?php echo $idkategori ;?>"><?php echo $kategori ;?></option>
			<?php endwhile;?>

			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Author :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="admin" disabled>
			<input type="hidden" class="form-control" value="admin" name="author">

		</div>
	
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tanggal :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $tanggal; ?>"  disabled>
			<input type="hidden" class="form-control" value="<?php echo $tanggal; ?>"  name="tanggal">

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
		<label class="col-sm-2 control-label">konten :</label>
		<div class="col-sm-4">
			<textarea name="konten" class="form-control" maxlength="242"required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Isi :</label>
		<div class="col-sm-9">
			<textarea name="isi" class="form-control" required></textarea >
			<script type="text/javascript">
					 // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'isi' );
                config.skin = 'office2013';
							
								</script>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-primary" value="Tambah"> 
		</div>
	</div>
</form>