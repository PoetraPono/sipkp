  
<?php
	include('connect.php');
	date_default_timezone_set("Asia/Jakarta");  

	$tanggal = date("Y-m-d");
	$jam = date("H:i:s");
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$email = mysqli_real_escape_string($koneksi,$_POST['email']);
	$web = mysqli_real_escape_string($koneksi,$_POST['web']);
	$isi = mysqli_real_escape_string($koneksi,$_POST['komentar']);
	$idartikel = mysqli_real_escape_string($koneksi,$_POST['idartikel']);



	// cek 
	if (empty($nama) or empty($email) or empty($web) or empty($isi))
		:
		echo "<script>alert('ada form yang kosong');window.history.go(-1); </script>";
		exit();
	elseif($nama =="admin" or $nama=="Admin")
		:
		echo "<script>alert('Nama tidak boleh Admin/admin');window.history.go(-1); </script>";
		exit();


	endif;


	$simpan = mysqli_query($koneksi,"INSERT INTO komentar SET nama='$nama',email='$email',website='$web' , isi='$isi' , tanggal='$tanggal' , jam='$jam',id_artikel='$idartikel'");

	if ($simpan)
		:
		echo "<script>location.href='../front/index.php?btn=artikel&id=$idartikel'; </script>";
	else
		:
		echo "<script>alert('gagal komentar');window.history.go(-1); </script>";
		exit();
	endif;
	
?>
