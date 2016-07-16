<title>Wisata Palembang</title>
		<br>
		<br>


<div class="container" >
	<div class="col-md-12">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
	<!-- Indicators -->
	<ol class="carousel-indicators">
	<?php
		$hitung=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM gambar "));
		for($i=0;$i<$hitung;$i++)
			:
		
	?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ;?>" class="<?php if($i==0): echo "active"; endif;?>"></li>
	<?php endfor;?>
		
	</ol>

	<!-- Wrapper for slides -->
		
	<div class="carousel-inner" role="listbox">
	<?php 
		$sql="SELECT nama_gambar,id_artikel,active FROM gambar Order by id_artikel desc ";

		$data = mysqli_query($koneksi,$sql);
		while(list($nama_gambar,$id_artikel,$active)=mysqli_fetch_row($data)) 
	: ?>
	
		<div class="item <?php if($active== 0) : echo "active"; endif; ?>">
			<center><a href="index.php?btn=artikel&id=<?php echo $id_artikel;?>" target="_blank"><img src="../back/satpam/img/<?php echo $nama_gambar;?>" height="650" width="1000" ></a></center>
			<div class="carousel-caption">
				<?php
					$caption=mysqli_query($koneksi,"SELECT judul,konten FROM artikel WHERE id_artikel='$id_artikel'  ");	
					while(list($title,$konten)=mysqli_fetch_row($caption))
						:
				?>
				<h3><?php echo $title ;?></h3>
				<i style="color:#fff"><?php echo $konten; ?></i>
			<?php endwhile;?>
			</div>
		</div>

		<?php endwhile;?>
		
	</div>
	
</div>
</div>
</div>

<!-- container fluid carousel -->
	<br>
	<?php
	/// panggil data untuk side nav last article
	$sql="SELECT id_artikel,judul,konten,tanggal,author,lihat FROM artikel Order by id_artikel desc limit 5";
	$data = mysqli_query($koneksi,$sql);
?>
<div class="row-fluid">
<!--- Side nav last article -->
<div class=" hidden-print hidden-xs hidden-sm">
	<div class="col-xs-4" >
		<h3>Last article</h3>
	
		<div class="list-group">
			<?php 

while(list($id,$judul,$konten,$tanggal,$author,$lihat)=mysqli_fetch_row($data))
	:


?>
	<a href="index.php?btn=artikel&id=<?php echo $id;?>" class="list-group-item "><h5><?php echo $judul ; ?></h5></a>
	<?php endwhile ;?>
	</div>
<!--- Side nav last most view -->
<h3>Most View</h3>
	
		<div class="list-group">
		<?php
			// panggil data most view
			$panggil = mysqli_query($koneksi,"SELECT id_artikel,judul from artikel order by lihat DESC limit 5")	;
			while(list($idmost,$judul)=mysqli_fetch_row($panggil))
				: ?>
			<a href="index.php?btn=artikel&id=<?php echo $idmost; ?>" class="list-group-item "><h5><?php echo $judul ; ?></h5></a>
		<?php endwhile; ?>	
	</div>


		
	</div>
	</div>


	<div class="col-md-8" >
	<div class="row-fluid">
	
	<?php 
	// pagination 
	$start=0;
	$limit=5;
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
	}
	//panggil data artikel berdasarkan tanggal paling baru dan di batasi dengan start dan limit 
	$data = mysqli_query($koneksi,"SELECT id_artikel,judul,konten,tanggal,author,lihat FROM artikel Order by id_artikel DESC limit $start,$limit ");
	while(list($idartikel,$judul,$konten,$tanggal,$author,$lihat)=mysqli_fetch_array($data))
	: ?>
<div class="media" id="box" >
	<div class="media-left" id="img-konten">
			<?php 
			$gambar = mysqli_query($koneksi,"SELECT nama_gambar FROM gambar where id_artikel ='$idartikel' ");
				list($nama_gambar)=mysqli_fetch_row($gambar);



			if($gambar) : ?>
			<a href="../back/satpam/img/<?php echo $nama_gambar ; ?>" rel="prettyPhoto" ><img class="media-object img-rounded" src="../back/satpam/img/<?php echo $nama_gambar ; ?>" width="140" height="140" alt="..."></a>
			
			<?php else :	?>
				<img src="img/uc.png" class="media-object img-rounded"  alt="..." width="140" height="140" >
			<?php endif;?>
		
	</div>
	<div class="media-body" >
		<a href="index.php?btn=artikel&id=<?php echo $idartikel;?>"><h3 class="media-heading" id="judul"><strong><?php echo $judul ; ?></strong></h3></a>
		<p class="text-muted">Posted by - <i><?php echo $author; ?></i> on <i><?php $tgl=explode("-", $tanggal); echo $tgl[2]."-".$tgl[1]."-".$tgl[0]; ?></i> </p>
		<p><?php echo $konten; ?> </p>
	</div>
	</div>
	<hr>
<?php endwhile;?>
	
	</div><!-- end of row -fluid -->
<br>
<br>


	<?php
// pagination
	//hitung jumlah baris tabel
$rows=mysqli_num_rows(mysqli_query($koneksi,"select * from artikel"));
$total=ceil($rows/$limit);

if($id>1)
	: ?>
<a href="?id=<?php echo ($id-1); ?>" class="btn btn-info pull-left"><span aria-hidden="true">&larr;</span>PREVIOUS</a></li>
<?php endif ; ?>
<?php
if($id!=$total)
	:?>
<a href="?id=<?php echo ($id+1) ?>" class="btn btn-info pull-right"  >NEXT<span aria-hidden="true">&rarr;</span></a>
<?php endif ; ?>
<br>
<br>
</div><!-- end of col-xs-8 -->
</div><!-- end of row fluid -->
	