
<?php
//security
	//error_reporting(E_ALL AND ~E_NOTICE);

	$id = $_SESSION['sesiid'];
	$user = $_SESSION['sesiuser'];
	//cocokan data
	$data = mysqli_query($koneksi,"SELECT username from user where id='$id'");

	list($username)=mysqli_fetch_row($data);
	
	if(empty($id) or $user!= "$username")
	:	
		echo "<script>alert('ente belum login');location.href='satpam.php'</script>";	
		exit();
		endif;
?>