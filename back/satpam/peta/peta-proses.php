<?php
	// terima data
	include('../connect.php');
	
	$nama=mysqli_real_escape_string($koneksi,$_POST['nama']);
	$alamat=mysqli_real_escape_string($koneksi,$_POST['alamat']);
	$latitude=mysqli_real_escape_string($koneksi,$_POST['latitude']);
	$longitude=mysqli_real_escape_string($koneksi,$_POST['longitude']);
	$datatarget=mysqli_real_escape_string($koneksi,$_POST['datatarget']);



	if(empty($nama) or empty($alamat) or empty($latitude) or empty($longitude) or empty($datatarget))
		:
			echo "<script>alert('Ada Form kosong');window.history.go(-1); </script>";
			exit();
	endif;
$simpan =mysqli_query($koneksi,"INSERT INTO peta SET nama='$nama',alamat='$alamat',latitude='$latitude',longitude='$longitude',data_target='$datatarget'");

if($simpan)
	:
		header('location:../index.php?btn=peta&tambah=success');
else
	:
		echo "<script>alert('Input gagal');window.history.go(-1); </script> ";
		exit();
endif;






?>