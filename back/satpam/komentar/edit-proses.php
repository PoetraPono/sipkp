  
<?php
	include('../connect.php');
	date_default_timezone_set("Asia/Jakarta");  
	$id= mysqli_real_escape_string($koneksi,$_POST['id']);
	$tanggal = date("Y-m-d");
	$jam = date("H:i:s");
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$email = mysqli_real_escape_string($koneksi,$_POST['email']);
	$web = mysqli_real_escape_string($koneksi,$_POST['web']);
	$isi = mysqli_real_escape_string($koneksi,$_POST['komentar']);







	// cek 
	if (empty($nama) or empty($email) or empty($web) or empty($isi))
		:
		echo "<script>alert('ada form yang kosong');window.history.go(-1); </script>";

	endif;


	$simpan = mysqli_query($koneksi,"UPDATE komentar SET nama='$nama',email='$email',website='$web' , isi='$isi' , last_tgl='$tanggal' ,last_jam='$jam' where id_komentar='$id'");

	if ($simpan)
		:
 			header('location:../index.php?btn=komentar&editkomentar=success');
		
	else
		:
		echo "<script>alert('gagal komentar');window.history.go(-1); </script>";
		exit();
	endif;
	
?>
