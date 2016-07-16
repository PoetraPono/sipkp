<?php


// mulai sesi
	session_start();
// terima data
	
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$password=md5($pass); // encrypt password

	// validasi data
	if(empty($username) or empty($pass))
		:
			echo "<script>alert('invalid data');window.history.go(-1);</script>";
			exit();
	endif;
//koneksi database
	include("../connect.php");

	

// panggil data
	$data=mysqli_query($koneksi,"SELECT id,username FROM user WHERE username='$username' AND password ='$password'");


// cek data ada atau tidak
	if(mysqli_num_rows($data) > 0)
		: //pecah menjadi array
		list($id,$user)=mysqli_fetch_array($data);
		// simpan session
		$_SESSION['sesiid']=$id;
		$_SESSION['sesiuser']=$user;
		echo "<script>location.href='../../../front/index.php'; </script>";
	else
		:	echo "<script>alert('Username atau Password salah');window.history.go(-1); </script>";
			exit();
	endif;

	



?>