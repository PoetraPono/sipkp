<br>
<br>
<br>


<!-- SIDE NAV -->
<div class="row-fluid">
<div class=" hidden-print hidden-xs hidden-sm">
	<div class="col-xs-4" >
		<h3>last artikel</h3>
	<?php
	/// panggil data artikel sidenav berdasarkan tanggal terakhir
	$data = mysqli_query($koneksi,"SELECT id_artikel,judul FROM artikel Order by tanggal DESC limit 5");
	?>
		<div class="list-group">
			<?php 

while(list($id,$judul)=mysqli_fetch_row($data))
	:
?>
	<a href="index.php?btn=artikel&id=<?php echo $id;?>" class="list-group-item "><h5><?php echo $judul ; ?></h5></a>
	<?php endwhile ;?>
	</div>
	<!--AREA SIDENAV MOST VIEW -->
	<h3>Most View</h3>
	
		<div class="list-group">
		<?php
	/// panggil data artikel sidenav berdasarkan paling banyak di lihat terakhir

			$panggil = mysqli_query($koneksi,"SELECT id_artikel,judul from artikel order by lihat DESC limit 5")	;
			while(list($idmost,$judul)=mysqli_fetch_row($panggil))
				:
		?>
			<a href="index.php?btn=artikel&id=<?php echo $idmost; ?>" class="list-group-item "><h5><?php echo $judul ; ?></h5></a>
		<?php endwhile; ?>	
	</div>


		
	</div>
	
	</div>
<?php 
	// terima data
	$id =mysqli_real_escape_string($koneksi,$_GET['id']);	

	// panggil data artikel
	$data = mysqli_query($koneksi,"SELECT judul,isi,tanggal,author,lihat,id_kategori,last_edit FROM artikel where id_artikel ='$id' ");
	list($judul,$isi,$tanggal,$author,$lihat,$kategori,$last)=mysqli_fetch_row($data);
	//UPDATE VIEWERS KETIKA REFRESH
	$pembaca=$lihat+1;
	$update = mysqli_query($koneksi,"UPDATE artikel SET lihat ='$pembaca' where id_artikel='$id'");
?>
<!-- ISI ARTIKEL -->
<div class="col-md-8">
<div class="row-fluid">
<h2 id="judul"><?php echo $judul; ?> </h2>

<p class="text-muted"> posted by <i><?php echo $author; ?> on <?php
// pecah tanggal 
$tglbaru = explode("-", $tanggal);
echo $tglbaru[2]."-".$tglbaru[1]."-".$tglbaru[0]; ?></i> </p>
<hr>
<p>	<?php 
	$gambar = mysqli_query($koneksi,"SELECT nama_gambar FROM gambar where id_artikel ='$id' ");
		list($nama_gambar)=mysqli_fetch_row($gambar);



			if($gambar) : ?>
			<a href="../back/satpam/img/<?php echo $nama_gambar ; ?>" rel="prettyPhoto" ><img class="img-thumbnail"src="../back/satpam/img/<?php echo $nama_gambar ; ?>" width="500" height="300" alt="..."></a>
			<?php else :	?>
				<img src="img/uc.png" alt="..." width="242" height="200" >
			<?php endif;?></p>
<p>
<?php echo $isi ;?>


</p>
<title><?php echo $judul; ?></title>
<br>
<?php if($last=="0000-00-00"  )
		: 
			echo "";
		
		?>
		
		<?php else 
		:	
		?>
		<i class="text-muted">Last edited on <?php 
					$last_edit= explode("-", $last);
					echo $last_edit[2]."-".$last_edit[1]."-".$last_edit[0];
					 ?> by <?php echo $author; ?></i>
				

			<?php endif;?>

<!-- SHARE BUTTON -->
<p><ul class="rrssb-buttons clearfix">
 <li class="rrssb-facebook">
    <a target="blank" href="https://www.facebook.com/sharer/sharer.php?u=http://wisata-palembang.com/index.php?btn=artikel%26id=<?php echo $id;?>" class="popup">
      <span class="rrssb-icon">
        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29" height="29" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"
          class="cls-2" fill-rule="evenodd"/></svg>
      </span>
      <span class="rrssb-text">facebook</span>
    </a>
  </li>  
  <li class="rrssb-twitter">
    <a target="blank" href="http://twitter.com/home?status=<?php echo $judul ; ?> http://wisata-palembang.com/index.php?btn=artikel%26id=<?php echo $id;?> "
    class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62c-3.122.162-6.22-.646-8.86-2.32 2.702.18 5.375-.648 7.507-2.32-2.072-.248-3.818-1.662-4.49-3.64.802.13 1.62.077 2.4-.154-2.482-.466-4.312-2.586-4.412-5.11.688.276 1.426.408 2.168.387-2.135-1.65-2.73-4.62-1.394-6.965C5.574 7.816 9.54 9.84 13.802 10.07c-.842-2.738.694-5.64 3.434-6.48 2.018-.624 4.212.043 5.546 1.682 1.186-.213 2.318-.662 3.33-1.317-.386 1.256-1.248 2.312-2.4 2.942 1.048-.106 2.07-.394 3.02-.85-.458 1.182-1.343 2.15-2.48 2.71z"/></svg></span>
      <span class="rrssb-text">twitter</span>
    </a>
  </li>
</ul></p>
<p>
<i class="glyphicon glyphicon-eye-open text-muted"></i> <i class="badge"><?php echo $pembaca; ?></i>
	
	<a href="<?php 
				// menentukan kategori
				$menentukan=mysqli_query($koneksi,"SELECT id_kategori,kategori from kategori where id_kategori='$kategori'");
				while(list($id_kategori,$datakategori)=mysqli_fetch_row($menentukan))
					:
				if($id_kategori == $kategori)
					:
				echo "index.php?btn=$kategori";
				endif;
				?>">
				<i 
				class="<?php if($id_kategori ==1) :
				echo "btn btn-xs btn-primary";
				elseif($id_kategori == 2  )
					:
				echo "btn btn-xs btn-success";
				else
					:
				echo "btn btn-xs btn-danger";

				endif; ?>"><?php echo $datakategori; ?></i></a>
			<?php endwhile;?>
</p>
<hr>
<!-- Panggil data komentar-->
<?php
	$komentar=mysqli_query($koneksi,"SELECT id_komentar,id_artikel,nama,email,isi,website,tanggal,jam,last_tgl,last_jam FROM komentar order by jam and tanggal ");
	while(
		list($idkomentar,$idartikel,$nama,$email,$isi,$web,$tanggal,$jam,$last_tgl,$last_jam)=mysqli_fetch_row($komentar))
		:
	// jika idartikel (foreign key) sama dengan  id artikel(primary key)
		if($idartikel == $id )
			:
?>
<!-- FORM TAMPIL KOMENTAR -->
<div class="media">
	<div class="media-body">
		<!-- KETERANGAN -->

		<h4><i>Nama : </i><?php if ($nama=="ooary"): ?> <font color="red"><?php echo $nama; ?></font> <?php else:  echo $nama; endif;?>  </h4>  
		<h5><i>Email:</i> <?php if($email=="admin-wisata@gmail.com") : ?><font color="blue"><?php echo $email; ?></font> <?php else : echo $email ; endif;?></h5>
		<h5><i>website:</i> <?php if ($web=="wisata-palembang.com"): ?> <font color="blue"><?php echo $web; ?></font> <?php else:  echo $web; endif;?> </h5>

		<!-- ISI -->

		<i class="text-muted">said:</i>
		<p><?php if ($nama=="ooary"): ?> <i><font color="blue"><?php echo $isi; ?></font></i> <?php else:  echo $isi; endif;?></p>

		<!-- TANGGAL -->
		<i class="text-muted">on <?php 
		$tglbaru = explode("-", $tanggal);

		echo $tglbaru[2]."-".$tglbaru[1]."-".$tglbaru[0]; ?> at <?php echo $jam;?></i>
		<?php
			if ($last_tgl=="0000-00-00"  and $last_jam=="00:00:00")
				:
				echo "";
			else
				:
		?>
			<p class="text-muted"><i>Last edited by admin on <?php echo $last_tgl." ". $last_jam;?></i></p>	
	<?php endif;?>
		<!-- JIKA SESI SAMA DENGAN ADMIN AKAN TAMPIL -->
		<?php
		if($user=="ooary")
			:
	?>
	<p><a href="index.php?btn=deletekomentar&id=<?php echo $idkomentar; ?>" onclick="javascript : return confirm('hapus komentar?');"><i class="glyphicon glyphicon-trash"></i></a></p>
	<?php endif;?>
	</div>
	

</div>
<hr>
	<?php 
			
		endif;
	?>
<?php endwhile; ?>
<!--FORM KOMENTAR -->
<h2>Post your comment here </h2>
<form class="form-horizontal" method="post" action="../config/comment-proses.php">
	<div class="form-group">
			<div class="col-md-3">
			<input type="text"  value="<?php if($user=='ooary') : echo 'ooary' ; endif;?>"  class="form-control"  name="nama" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?> placeholder="nama">
			<?php if($user=="ooary") :  ?>
					<input type="hidden"  value="ooary" name="nama" class="form-control" placeholder="nama" required>
			<?php endif;?>
			

		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="email"  value="<?php if($user=='ooary') : echo 'admin-wisata@gmail.com' ; endif;?>" name="email" class="form-control" placeholder="email" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?>>
			<?php if($user=='ooary') : ?>
			<input type="hidden"  value="admin-wisata@gmail.com" name="email" class="form-control" placeholder="email" >
		<?php endif;?>
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="text"  value="<?php if($user=='ooary') : echo 'wisata-palembang.com' ; endif;?>" name="web" class="form-control" placeholder="web" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?>>
			<?php if($user=='ooary') : ?>
				<input type="hidden"  value="wisata-palembang.com" name="web" class="form-control" placeholder="web" >
				<?php endif;?>
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-5">
			<textarea name="komentar" class="form-control" rows="5" cols="5" placeholder="komentar"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-2">
		<input type="hidden" value="<?php echo $id ; ?>" name="idartikel">
			<input type="submit" class="btn btn-primary" value="komentar"> 
		</div>
	</div>


</form>


</div>
</div>
</div>