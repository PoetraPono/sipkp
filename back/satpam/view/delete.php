<?php
	$id = $_GET['id'];

	include('connect.php');

	//delete data

	$delete=mysqli_query($koneksi,"DELETE from artikel where id_artikel='$id' ") ;

	// validasi
		if($delete)
			:
			$komentar=mysqli_query($koneksi,"DELETE from komentar where id_artikel='$id'");
		if($komentar)
			:
				//perintah hapus gambar dari folder dengan memanggil nama gambar terlebih dahulu
				$panggil=mysqli_query($koneksi,"SELECT nama_gambar from gambar where id_artikel='$id'");
				list($nama)=mysqli_fetch_row($panggil);
				unlink("img/$nama");
				$gambar=mysqli_query($koneksi,"DELETE from gambar where id_artikel='$id'");

				header('location:index.php?btn=view&hapus=success');
		else
			:
				echo "<script>alert('gagal hapus gambar dan komentar');window.history.go(-1); </script>";
		endif;
		else
			:
			echo "<script>alert('gagal hapus');window.history.go(-1); </script>";
		endif;



?>