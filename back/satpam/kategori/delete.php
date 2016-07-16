<?php
	$id = $_GET['id'];

	include('connect.php');

	//delete data

	$delete=mysqli_query($koneksi,"DELETE from kategori where id_kategori='$id' ");

	// validasi
		if($delete)
			:
			header('location:index.php?btn=kategori&hapus=success');
		else
			:
			echo "<script>alert('gagal hapus');window.history.go(-1); </script>";
		endif;



?>