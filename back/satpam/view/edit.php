<?php
	$tanggal=date("Y-m-d");
	// panggil id
	$id =mysqli_real_escape_string($koneksi,$_GET['id']);
	// panggil data
	$data = mysqli_query($koneksi,"SELECT judul,konten,isi,id_kategori From artikel where id_artikel='$id'");
	list($judul,$konten,$isi,$kategori)=mysqli_fetch_row($data);
?>
<h3 align="center">Edit Artikel</h3>
<hr>
					

<form class="form-horizontal" method="post" action="view/edit-proses.php">
	<div class="form-group">
		<label class="col-sm-2 control-label">Judul :</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $judul ?>"required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Kategori :</label>
		<div class="col-sm-2">
			<select class="form-control" name="kategori">
			<?php
				$data = mysqli_query($koneksi,"SELECT id_kategori,kategori From kategori");

				while(list($id_kategori,$datakategori)=mysqli_fetch_row($data))
					:
			?>
				<option value="<?php echo $id_kategori ;?>" <?php if($kategori==$id_kategori) : echo "selected"; endif;?>><?php echo $datakategori ;?></option>
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

		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">konten :</label>
		<div class="col-sm-4">
			<textarea name="konten" class="form-control" required><?php echo $konten; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Isi :</label>
		<div class="col-sm-9">
			<textarea name="isi" class="form-control" required><?php echo $isi; ?></textarea >
			<script type="text/javascript">
					 // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'isi' );
                config.skin = 'office2013';
							
								</script>
		</div>
	</div>
	<!-- pengiriman id -->
	<input type="hidden" value="<?php echo $id ; ?>" name="id">


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-primary" value="Tambah"> 
		</div>
	</div>
</form>