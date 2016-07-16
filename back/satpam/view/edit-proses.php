

<?php
	include("../connect.php");
	//terima data
	$id=mysqli_real_escape_string($koneksi,$_POST['id']);
	$judul = mysqli_real_escape_string($koneksi,$_POST['judul']);
$kategori = mysqli_real_escape_string($koneksi,$_POST['kategori']);
	$author = mysqli_real_escape_string($koneksi,$_POST['author']);
	$tanggal = date("Y-m-d");
	$konten = mysqli_real_escape_string($koneksi,$_POST['konten']);
	$isi = mysqli_real_escape_string($koneksi,$_POST['isi']);






	if(empty($judul) or empty($konten) or empty($isi))
	:
		echo "<script>alert('Ada data kosong');window.history.go(-1); </script>";
		exit();
	endif;

// simpan data
 	$simpan =mysqli_query($koneksi,"UPDATE artikel SET judul='$judul' , last_edit='$tanggal', author='$author' , konten ='$konten' , isi='$isi' ,id_kategori='$kategori' where id_artikel='$id'");

 	if($simpan)
 		:
 			header('location:../index.php?btn=view&edit=success');
 	else
 		:
 			echo "<script>alert('edit posting gagal');window.history.go(-1);</script>";
 			exit();
 	endif;





?>