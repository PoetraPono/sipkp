

<?php
	include("../connect.php");
	//terima data
	$id=mysqli_real_escape_string($koneksi,$_POST['idkategori']);
	$nama=mysqli_real_escape_string($koneksi,$_POST['nama']);
	$defin=mysqli_real_escape_string($koneksi,$_POST['def']);





	if(empty($nama) or empty($defin))
		:
		echo "<script>alert('Ada data kosong');window.history.go(-1); </script>";
		exit();
	endif;

// simpan data
 	$simpan =mysqli_query($koneksi,"UPDATE kategori SET kategori='$nama',defin='$defin' where id_kategori='$id'");

 	if($simpan)
 		:
 			header('location:../index.php?btn=kategori&edit=success');
 	else
 		:
 			echo "<script>alert('edit posting gagal');window.history.go(-1);</script>";
 			exit();
 	endif;





?>