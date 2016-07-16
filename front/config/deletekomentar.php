<?php
	$id = $_GET['id'];
	

	

	//delete data

	$delete=mysqli_query($koneksi,"DELETE from komentar where id_komentar='$id' ");

	// validasi
		if($delete)
			:
			echo "<script>window.history.go(-1); </script>";
			exit();

			//header('location:../front/index.php?btn=artikel&id=$wakwaw');
		else
			:
			echo "<script>alert('gagal hapus');window.history.go(-1); </script>";
			exit();
		endif;



?>