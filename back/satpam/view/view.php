
<title>Daftar Artikel</title>
<?php
	// terima data search

	$search=$_POST['search'];

	$data = "SELECT a.id_artikel,a.judul,a.tanggal,a.author,a.id_kategori,a.lihat,a.last_edit,b.kategori,b.id_kategori,c.id_artikel,c.nama_gambar from artikel a,kategori b,gambar c where b.id_kategori = a.id_kategori AND c.id_artikel = a.id_artikel";
	if(!empty($search))
		:	$data .= " AND a.judul LIKE '%$search%' order by a.tanggal desc";

	else 
		: 
			$data .= " order by a.tanggal desc";
	endif;
	$panggil=mysqli_query($koneksi,$data) or die(mysqli_error($koneksi));;


	$no=1;

	
?>


<h3 align="center" id="title">Daftar Artikel</h3>
<hr>
		<?php
			if(!empty($_GET['tambah']) && $_GET['tambah']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Posting !</h3></div>";
			 elseif (!empty($_GET['edit']) && $_GET['edit'] == 'success') 
			 	:
			echo "<div class=\"alert alert-success\">Berhasil Edit POSTING!</h3></div>";
			elseif (!empty($_GET['hapus']) && $_GET['hapus']=='success')
				:
			echo "<div class=\"alert alert-success\">Hapus berhasil!</h3></div>";
			endif;

		?>
		<div class="row-fluid">
		<div class="col-xs-12">
		<form method="post" action="index.php?btn=view">
		
		<div class="form-group col-md-3" >
		<div class="form-group">
		<input type="text" class="form-control" for="source" id="source" name="search" placeholder="Search">
		</div>

		</div>
		 <div class="col-md-1">
      <input type="submit" name="btn" value="search" class="btn btn-warning">
      </div>
		
				
			</form>
	

			<div class="col-md-8" >
			<div class="form-group">
			<a href="index.php?btn=add" class="btn btn-primary pull-right" id="jarak">Add Artikel</a>
			</div>

			</div>
			</div>
			</div>

<div class="row-fluid" >

	<div class="col-xs-12">
<div class="table-responsive" >

<table class="table table-hover table-stripped">
<tr>
	<th class="success">No</th>
	<th class="success">Judul</th>
	<th class="success">Kategori</th>
	<th class="success">Gambar</th>

	<th class="success">Pengirim</th>
	<th class="success">Tanggal</th>
	<th class="success">Last edit</th>
	<th class="success">Jumlah Pembaca</th>
	

	<th class="success">Action</th>
</tr>
	<?php
		while(list($id_artikel,$judul,$tanggal,$author,$kategori,$lihat,$last,$namakat,$id_kat,$id_art,$namagam)=mysqli_fetch_row($panggil))
			:
	?>
	<tr>
		<td><?php echo $no++ ; ?></td>
		<td><?php echo $judul ; ?></td>
		<td><?php echo $namakat
				
				?></td>
		<td><?php 
			echo $namagam; 
		?></td>
		<td><?php echo $author ; ?></td>
		<td><?php echo $tanggal ; ?></td>
		<td><?php echo $last ; ?></td>
		<td><?php echo $lihat ; ?></td>


		<td><a href="index.php?btn=lihat&id=<?php echo $id_artikel ; ?>" class="glyphicon glyphicon-eye-open"></a> | <a href="index.php?btn=editartikel&id=<?php echo $id_artikel ; ?>" class="glyphicon glyphicon-pencil" 
		></a>  | <a href="index.php?btn=deleteedit&id=<?php echo $id_artikel ; ?>" onclick="javascript: return confirm('Apakah Anda Yakin?')"class="glyphicon glyphicon-trash"></a> </td>



	</tr>
<?php endwhile;?>

</table>
</div>
</div>
</div>