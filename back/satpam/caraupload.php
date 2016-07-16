<?php
#terima data
$file=$_FILES['gambar']['name']; //nama file dari file yg di upload

#buat namafile baru
$newname="UPL-".rand(1,1000);


//ambil file dan di pindahkan ke dalam folder server kita
$move= move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/$newname");

//koneksi kedb

//simpan nama ke dalam db (nama yang baru)
if($move):
	$qsimpan="";

	if():

	else:
		unlink("../upload/$newname");
	endif;



endif;
?>