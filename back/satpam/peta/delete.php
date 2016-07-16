<?php
	$id = $_GET['id'];

	include('connect.php');

	//delete data

	$delete=mysqli_query($koneksi,"DELETE from peta where id_peta='$id' ");

	// validasi
		if($delete)
			:
			header('location:index.php?btn=peta&hapus=success');
		else
			:
			echo "<script>alert('gagal hapus');window.history.go(-1); </script>";
		endif;



?>