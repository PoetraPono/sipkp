<?php
	$id = $_GET['id'];

	include('connect.php');

	//delete data

	$delete=mysqli_query($koneksi,"DELETE from gambar where id_gambar='$id' ");

	// validasi
		if($delete)
			:
			header('location:index.php?btn=addgambar&hapus=success');
		else
			:
			echo "<script>alert('gagal hapus');window.history.go(-1); </script>";
		endif;



?>