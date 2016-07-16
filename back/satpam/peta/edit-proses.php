<?php
	// terima data
	include('../connect.php');
	// terima data id
	$idpeta = mysqli_real_escape_string($koneksi,$_POST['idpeta']);
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
$simpan =mysqli_query($koneksi,"UPDATE peta SET nama='$nama',alamat='$alamat',latitude='$latitude',longitude='$longitude',data_target='$datatarget' where id_peta ='$idpeta'");

if($simpan)
	:
		header('location:../index.php?btn=peta&edit=success');
else
	:
		echo "<script>alert('Input gagal');window.history.go(-1); </script> ";
		exit();
endif;






?>