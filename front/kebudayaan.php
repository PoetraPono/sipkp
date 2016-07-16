<title>Kebudayaan Palembang</title>
<br>
<br>
<br>
<?php
	// terima data ID dari link
	$btn = mysqli_real_escape_string($koneksi,$_GET['btn']);
	// panggil data artikel berdasarkan kategori kebudayaan yang di ambil dari link
	$panggil =mysqli_query($koneksi,"SELECT id_artikel,judul,tanggal,author,konten FROM artikel where id_kategori='$btn' order by tanggal DESC");
?>
<div class="jumbotron">
	<h1>Kebudayaan </h1>
	<h4>Mengenal budaya kota palembang lebih dekat</h4>
	
</div>
<div class="row-fluid">
<?php
	// eksekusi data
	while(list($id,$judul,$tanggal,$author,$konten)=mysqli_fetch_row($panggil))
		: ?>
<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
		<!-- panggil gambar -->
		<?php 
			$gambar = mysqli_query($koneksi,"SELECT nama_gambar FROM gambar where id_artikel ='$id' ");
				list($nama_gambar)=mysqli_fetch_row($gambar);
			if($gambar) :  ?>
			<img class="img-thumbnail"src="../back/satpam/img/<?php echo $nama_gambar ; ?>"  alt="...">
			<?php else :	?>
				<img src="img/uc.png" alt="..." width="242" height="200" >
			<?php endif;?>
			<div class="caption">
				<h3><strong><?php echo $judul; ?></strong></h3>
		<p class="text-muted">Posted by - <i><?php echo $author; ?></i> on <i> <?php $tgl=explode("-", $tanggal); echo $tgl[2]."-".$tgl[1]."-".$tgl[0]; ?></i> </p>
				
				<p><?php echo $konten ; ?></p>
				<p><a href="index.php?btn=artikel&id=<?php echo $id; ?>" class="btn btn-primary" role="button">Baca</a> </p>	
						</div>
		</div>
	
	</div>
	<?php endwhile; ?>
</div>