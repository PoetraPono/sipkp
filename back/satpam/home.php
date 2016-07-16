<title>Dashboard</title>
<h3 align="center" id="title">Dashboard</h3>
<div class="row-fluid">
	<div class="col-md-12" >
	<div class="col-md-6">
		<center><div>
		<h4 id="dash" class="warna-1" align="center">
		<p id="judul"><?php 
				//hitung data artikel 
				$artikel= mysqli_query($koneksi,"SELECT * FROM artikel ");
				$hitung = mysqli_num_rows($artikel);
				echo $hitung ;
		?></p>
		</h4>
		<h3 id="title">Jumlah artikel</h3>
		</div></center>
		</div>


<!-- tabel last komen -->
<div class="col-md-6">
<center><div>
		<h4 id="dash" class="warna-2" align="center">
		<p id="judul"><?php 
				//hitung data komentar 
				$komentar= mysqli_query($koneksi,"SELECT * FROM komentar ");
				$hitung = mysqli_num_rows($komentar);
				echo $hitung ;
		?></p>
		</h4>
		<h3 id="title">Jumlah Komentar</h3>
		</div></center>
</div>


</div>
</div><!-- end of row fluid -->
<div class="row-fluid">
	<div class="col-md-12" id="paper">
		

		<h3 align="center" class="head-title">Last Comment</h3>
	
		<div class="table-responsive">
			<table class="table table-hover table-stripped">
				<tr class="success">
				<th>No</th>
				<th>Nama</th>
				<th>komentar</th>
				<th>Artikel</th>

				<th>jam</th>

				<th>tanggal</th>

				
				</tr>
				<?php
					
					$no = 1;
					// panggil tabel komentar
					$panggil = mysqli_query($koneksi,"SELECT id_artikel,nama,isi,jam,tanggal from komentar order by tanggal DESC");
					while(
						list($idartikel,$nama,$komentar,$jam,$tanggal)=mysqli_fetch_row($panggil))
						:
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $nama ; ?></td>
					<td><?php echo $komentar ; ?></td>
					<td><?php 
					//panggil tabel artikel untuk judul
					$data = mysqli_query($koneksi,"SELECT id_artikel,judul from artikel where id_artikel='$idartikel'");
					list($idjudul,$judul)=mysqli_fetch_row($data);

					if($idartikel==$idjudul) : echo $judul ; 
					elseif($idartikel == 0) : echo "peta"; endif; ?></td>

					<td><?php echo $jam ;?></td>
					<td><?php echo $tanggal; ?></td>



				</tr>
				<?php endwhile;?>

			</table>	
					
		</div>
	</div>
	

</div>

    