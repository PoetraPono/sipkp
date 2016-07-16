<?php
	session_start();
	// penghapusan sesi dengan memilih/ satu per satu
	unset($_SESSION['sesiid']);
	unset($_SESSION['sesiuser']);
	//penghapusan seluruh sesi yang ada di session
	// session_destroy();
	// cek session masih ad aatau tidak
	if(!empty($_SESSION['sesiid']) AND !empty($_SESSION['sesiuser']))
		:
			echo "<script>alert('Gagal logout');window.history.go(-1); </script>";
			
	else
		:
			echo "<script>location.href='index.php'</script>";
	endif;

?>