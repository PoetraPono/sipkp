<?php
	$id=$_GET['id'];
	// panggil data
	$data = mysqli_query($koneksi,"SELECT judul,tanggal,author,lihat,konten,isi,kategori,gambar from artikel where id ='$id' ");

	list($judul,$tanggal,$author,$lihat,$konten,$isi,$kategori,$gambar)=mysqli_fetch_row($data);

	$pembaca=$lihat+1;

	$update = mysqli_query($koneksi,"UPDATE artikel SET lihat ='$pembaca' where id='$id'");


?>

<div >
<h3><?php echo $judul ?></h3>
	<img src="img/<?php echo $gambar ?>">
	<?php echo $isi;?>



</div>