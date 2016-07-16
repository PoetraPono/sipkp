<?php 
	//panggil
	$panggil = mysqli_query($koneksi,"SELECT id_komentar,id_artikel,nama,email,website,tanggal,jam,last_tgl,last_jam FROM komentar order by tanggal DESC");


?>
<title>List Komentar</title>
<div id="paper">
<h2 align="center" id="title">Komentar</h2>
<hr>
<?php
			if(!empty($_GET['editkomentar']) && $_GET['editkomentar']=='success')
				:
			echo "<div class=\"alert alert-success\">Berhasil Edit komentar !</h3></div>";
			elseif (!empty($_GET['hapus']) && $_GET['hapus']=='success')
				:
			echo "<div class=\"alert alert-success\">Hapus berhasil!</h3></div>";
			endif;

?>
<div class="table-responsive">

<table class="table table-hover table-stripped">
<tr class="info">
	<th>No</th>
	<th>Nama</th>	
	<th>email</th>
	<th>Artikel</th>
	<th>jam</th>
	<th>tanggal</th>
	<th>Edit terakhir tanggal</th>
	<th>Edit terakhir jam </th>
	<th>ACTION</th>	
</tr>
<?php
	// panggil judul artikel 
	$no = 1 ;
	while(list($id_komentar,$id_artikel,$nama,$email,$web,$tanggal,$jam,$last_tgl,$last_jam)=mysqli_fetch_row($panggil))
	:
?>
	<tr>
		<td><?php echo $no++ ;?></td>
		<td><?php if ($nama=="ooary"): ?> <font color="red"><?php echo $nama; ?></font> <?php else:  echo $nama; endif;?></td>
		<td><?php echo $email ;?></td>
		<td><?php 
					$judul = mysqli_query($koneksi,"SELECT id_artikel,judul from artikel where id_artikel ='$id_artikel' ");
					list($id_judul,$judul)=mysqli_fetch_row($judul);
				if ($id_artikel==$id_judul) 
					:
				echo $judul; 
				elseif($id_artikel== 0)
					:
				echo "Peta";
				endif;
		?></td>
		<td><?php echo $jam ;?></td>
		<td><?php echo $tanggal ;?></td>
		<td><?php echo $last_tgl ; ?></td>
		<td><?php echo $last_jam; ?></td>
		<td><a href="index.php?btn=editkomentar&id=<?php echo $id_komentar; ?>" class="glyphicon glyphicon-pencil"></a> | <a href="index.php?btn=hapuskomentar&id=<?php echo $id_komentar; ?>" 
		onclick="javascript: return confirm('hapus komentar?')"class="glyphicon glyphicon-trash"></a></td>



	</tr>
<?php endwhile ; ?>

</table>


</div>
</div>