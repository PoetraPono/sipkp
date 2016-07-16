<?php
	include("../connect.php");
	//terima data

$judul = mysqli_real_escape_string($koneksi,$_POST['judul']);

$kategori = mysqli_real_escape_string($koneksi,$_POST['kategori']);
$author = mysqli_real_escape_string($koneksi,$_POST['author']);
$tanggal = mysqli_real_escape_string($koneksi,$_POST['tanggal']);
$active=$_POST['active'];

$file=$_FILES['gambar']['name'];
//ukuran file
$ukuran=$_FILES['gambar']['size'];
//terima nama file pengganti dari nama file asli
$namagambar= mysqli_real_escape_string($koneksi,$_POST['namagambar']);
//pecah nama file untuk nama baru
$filex = explode(".",$file);
//nama baru setelah di pecah
$imgname = $namagambar.".".$filex[1];
//tempat asal file
$asal=$_FILES['gambar']['tmp_name'];
//untuk keterangan error
$error=$_FILES['gambar']['error'];
// cek format gambar
$format = pathinfo($file,PATHINFO_EXTENSION);
//simpan gambar
// move_uploaded_file(tempat asal,tujuan atau folder penyimpanan gambar)
$move= move_uploaded_file($asal,"../img/$imgname");
$konten = mysqli_real_escape_string($koneksi,$_POST['konten']);
$isi = mysqli_real_escape_string($koneksi,$_POST['isi']);
//simpan gambar

// validasi form judul,konten,isi
if(empty($judul) or empty($konten) or empty($isi) or empty($namagambar))
	:
		echo "<script>alert('Ada data kosong');window.history.go(-1); </script>";
		exit();
endif;

// simpan data

		$simpan=mysqli_query($koneksi,"INSERT INTO artikel SET judul='$judul' , tanggal='$tanggal', author='$author'  ,konten ='$konten' , isi='$isi' ,id_kategori='$kategori' ");
		if($simpan)
			:
		if ($error==0 || $ukuran <500000 || $format=="jpg" || $format =="png")
			:
		if($move)
		:
		// panggil id artikel terakhir
		$panggil=mysqli_query($koneksi,"SELECT id_artikel FROM artikel order by id_artikel DESC");
		list($id_artikel)=mysqli_fetch_row($panggil);
		$simpangambar=mysqli_query($koneksi,"INSERT INTO gambar SET nama_gambar='$imgname', active='$active', id_artikel='$id_artikel' ");
		if($simpangambar)
			:
			header('location:../index.php?btn=view&tambah=success');
		else
		:
			echo "Simpan Error";
		endif;
		else :
			unlink("../img/$imgname");
		endif;
		else
			:
		echo "<script>alert('DATA kebesaran/Format data bukan jpg/png');window.history.go(-1);</script>";
		exit();
		endif;
		else
			:
			echo "<script>alert('gagal posting');window.history.go(-1); </script>";
			exit();
		endif;
		

