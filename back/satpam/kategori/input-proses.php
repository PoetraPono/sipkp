<?php
	// terima data
	include('../connect.php');
	
	$nama=mysqli_real_escape_string($koneksi,$_POST['nama']);
	$def=mysqli_real_escape_string($koneksi,$_POST['def']);





	if(empty($nama))
		:
			echo "<script>alert('Ada Form kosong');window.history.go(-1); </script>";
			exit();
	endif;
$simpan =mysqli_query($koneksi,"INSERT INTO kategori SET kategori='$nama',defin='$def'");
if($simpan)
	:
		header('location:../index.php?btn=kategori&tambah=success');
else
	:
		echo "<script>alert('Input gagal');window.history.go(-1); </script> ";
		exit();
endif;






?>