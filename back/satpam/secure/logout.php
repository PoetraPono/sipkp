<?php
	session_start();

	unset($_SESSION['sesiuser']);
	unset($_SESSION['sesiid']);

	// cek validasi

	if(!empty($_SESSION['sesiuser']) AND !empty($_SESSION['sesiid']))
		:
		echo "<script>alert('gagal logout');window.history.go(-1);</script>";
	else
		:
			echo "<script>location.href='../../../front/index.php' ;</script>";
	endif;
	

?>