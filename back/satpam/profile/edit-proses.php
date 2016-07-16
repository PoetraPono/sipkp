<?php

	$user=$_POST['username'];
	$password=$_POST['password'];
	$pass=md5($password);
	$id=$_POST['id'];

	if(empty($user) or empty($password))
		:
	echo "<script>alert('ada form kosong');window.history.go(-1); </script>";
	exit();
	endif;



	include('../connect.php');
	$simpan=mysqli_query($koneksi,"UPDATE user SET username='$user' , password='$pass' where id='$id'");
	if($simpan)
		:
		header('location:../index.php?btn=profile&edit=success');
	else:
	echo "<script>alert('gagal edit');window.history.go(-1); </script>";
	exit();
	endif;


?>