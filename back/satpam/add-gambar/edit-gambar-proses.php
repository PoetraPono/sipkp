<?php
include('../connect.php');

$id=$_POST['id_gambar'];
$active=$_POST['active'];
$namasebelum=$_POST['namasebelum'];

$file=$_FILES['gambar']['name'];
//ukuran file
$ukuran=$_FILES['gambar']['size'];
//terima nama file pengganti dari nama file asli
$namagambar= mysqli_real_escape_string($koneksi,$_POST['namagambar']);
//pecah nama file untuk nama baru
$filex = explode(".",$file);
//nama baru setelah di pecah
$imgname = $namagambar.".".$filex[1];
//tempat asal file
$asal=$_FILES['gambar']['tmp_name'];
//untuk keterangan error
$error=$_FILES['gambar']['error'];
// cek format gambar
$format = pathinfo($file,PATHINFO_EXTENSION);
//simpan gambar
// move_uploaded_file(tempat asal,tujuan atau folder penyimpanan gambar)
$move= move_uploaded_file($asal,"../img/$imgname");

if ($error==0 || $ukuran <500000 || $format=="jpg" || $format =="png")
	:
	if($move)
		:
		$hapus=unlink("../img/$namasebelum");
	if($hapus)
		 : $simpan=mysqli_query($koneksi,"UPDATE gambar SET nama_gambar='$imgname', active='$active' where id_gambar='$id' ");
	if($simpan)
		:	
			header('location:../index.php?btn=addgambar&edit=success');
	else
		:
			echo "Simpan Error";

	endif;
	endif;

	else
		:
		unlink("../img/$imgname");
	endif;
else
	:
		echo "<script>alert('DATA kebesaran/Format data bukan jpg/png');window.history.go(-1);</script>";
		exit();
endif;
?>