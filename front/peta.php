<title>Peta palembang</title>
	<link rel='stylesheet' type='text/css' href='../css/map.css' />
	<script type='text/javascript'>
		  $(function() {
    // menentukan latitude dan longitude palembang
      var palembang = new google.maps.LatLng(-2.987907, 104.760250),
          pointToMoveTo, 
          first = true,
          curMarker = new google.maps.Marker({}),
          $el;
      
      var myOptions = {
          zoom: 15,
          center: palembang,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
      
      var map = new google.maps.Map($("#map_canvas")[0], myOptions);
    
      $("#locations li").mouseenter(function() {
      
        $el = $(this);
                
        if (!$el.hasClass("hover")) {
        
          $("#locations li").removeClass("hover");
          $el.addClass("hover");
        
          if (!first) { 
            
            // Clear current marker
            curMarker.setMap(); 
            
            // Set zoom back to Chicago level
            // map.setZoom(10);
          }
          
          // Move (pan) map to new location
          pointToMoveTo = new google.maps.LatLng($el.attr("data-geo-lat"), $el.attr("data-geo-long"));
          map.panTo(pointToMoveTo);
          
          // Add new marker
          curMarker = new google.maps.Marker({
              position: pointToMoveTo,
              map: map,
              icon: "img/marker.png"
          });
          
          // On click, zoom map
          google.maps.event.addListener(curMarker, 'click', function() {
             map.setZoom(20);
          });
          
          // Fill more info area
          $("#more-info")
            .find("h2")
              .html($el.find("h3").html())
              .end()
            .find("p")
              .html($el.find(".longdesc").html());
          
          // No longer the first time through (re: marker clearing)        
          first = false; 
        }
        
      });
      
      $("#locations li:first").trigger("mouseenter");
      
    });

  </script>
  <div>
<br>
<br>
<br>
<?php

	$sql="SELECT id_artikel,judul FROM artikel Order by tanggal desc limit 5";
	$data = mysqli_query($koneksi,$sql);

	

?>
<div class="row-fluid" >

<div class=" hidden-print hidden-xs hidden-sm">
	<div class="col-xs-4" >
		<h3>Last artikel</h3>
	
		<div class="list-group">
			<?php 

while(list($id,$judul)=mysqli_fetch_row($data))
	:


?>
	<a href="index.php?btn=artikel&id=<?php echo $id;?>" class="list-group-item "><?php echo $judul ; ?></a>
	<?php endwhile ;?>
	</div>
	<h3>Most View</h3>
	<hr>
		<div class="list-group">
		<?php
			$panggil = mysqli_query($koneksi,"SELECT id_artikel,judul from artikel order by lihat DESC limit 5")	;
			while(list($idmost,$judul)=mysqli_fetch_row($panggil))
				:
		?>
			<a href="index.php?btn=artikel&id=<?php echo $idmost; ?>" class="list-group-item "><?php echo $judul ; ?></a>
		<?php endwhile; ?>	
	</div>


		
	</div>
	</div>
	
	<h2>Peta Kota palembang</h2>
	<hr>
	


<div class="col-md-8">
<div class="row-fluid"> 
<div class="col-md-12">
    <center><div id="map_canvas"></div></center>

     <div class="col-md-1">
     <ul id="locations">
     <?php
     	//panggil data peta
     	$panggil=mysqli_query($koneksi,"SELECT nama,alamat,latitude,longitude,data_target FROM peta order by id_peta");
     	while(list($nama,$alamat,$latitude,$longitude,$data_target)=mysqli_fetch_row($panggil))
     		:
     ?>
      <li data-geo-lat="<?php echo $latitude; ?>" data-geo-long="<?php echo $longitude; ?>">
     
            <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="<?php echo "#".$data_target;?>" aria-expanded="false" aria-controls="collapseExample">
             <?php echo $nama ; ?>
              </button>
              <div class="collapse" id="<?php echo $data_target ; ?>">
             <div class="bs-example">
              
              <div class="well">
               <p><?php echo $alamat; ?></p>
             
                </div>
            </div>
      </div><!-- end of bs- example -->          
        </li>
    <?php endwhile; ?>

        </ul>
        </div><!-- end of col- md-1 -->
</div>
        </div><!-- end of row-fluid -->
            

<div class="row-fluid">
<div class="col-md-12">
<hr>
<?php
	// panggil isi komentar
	$komentar=mysqli_query($koneksi,"SELECT id_komentar,id_artikel,nama,email,isi,website,tanggal,jam,last_tgl,last_jam FROM komentar order by jam and tanggal DESC");
	while(
		list($idkomentar,$idartikel,$nama,$email,$isi,$web,$tanggal,$jam,$last_tgl,$last_jam)=mysqli_fetch_row($komentar))
		:
	//jika id artikel == 0 maka sama dengan halaman peta
		if($idartikel == 0 )
			:
?>
<!-- FORM TAMPIL KOMENTAR -->
<div class="media">
	<div class="media-body">
		<!-- KETERANGAN -->

		<h4><i>Nama : </i><?php if ($nama=="ooary"): ?> <font color="red"><?php echo $nama; ?></font> <?php else:  echo $nama; endif;?>  </h4>  
		<h5><i>Email:</i> <?php if($email=="admin-wisata@gmail.com") : ?><font color="blue"><?php echo $email; ?></font> <?php else : echo $email ; endif;?></h5>
		<h5><i>website:</i> <?php if ($web=="wisata-palembang.com"): ?> <font color="blue"><?php echo $web; ?></font> <?php else:  echo $web; endif;?> </h5>

		<!-- ISI -->

		<i class="text-muted">said:</i>
		<p><?php if ($nama=="ooary"): ?> <i><font color="blue"><?php echo $isi; ?></font></i> <?php else:  echo $isi; endif;?></p>

		<!-- TANGGAL -->
		<i class="text-muted">on <?php 
		$tglbaru = explode("-", $tanggal);

		echo $tglbaru[2]."-".$tglbaru[1]."-".$tglbaru[0]; ?> at <?php echo $jam;?></i>
		<!-- JIKA TANGGAL EDIT == "0000-00-00" maka kosong-->		
	<?php
			if ($last_tgl=="0000-00-00"  and $last_jam=="00:00:00")
				:
				echo "";
			else
				:
		?>
			<p class="text-muted"><i>Last edited by admin on <?php echo $last_tgl." ". $last_jam;?></i></p>	
	<?php endif;?>
		<!-- JIKA SESSION =  ADMIN/OOARY AKAN TAMPIL -->
		<?php
		if($user=="ooary")
			:
	?>
	<p><a href="index.php?btn=deletekomentar&id=<?php echo $idkomentar; ?>" onclick="javascript : return confirm('hapus komentar?');"><i class="glyphicon glyphicon-trash"></i></a></p>
	<?php endif;?>
	</div>
	

</div>
<hr>
	<?php endif; 
		endwhile;?>


<!--FORM KOMENTAR -->
<h2>Post your comment here </h2>
<form class="form-horizontal" method="post" action="../config/comment-peta.php">
	<div class="form-group">
			<div class="col-md-3">
			<input type="text"  value="<?php if($user=='ooary') : echo 'ooary' ; endif;?>"  class="form-control"  name="nama" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?> placeholder="nama">
			<?php if($user=="ooary") :  ?>
					<input type="hidden"  value="ooary" name="nama" class="form-control" placeholder="nama" required>
			<?php endif;?>
			

		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="email"  value="<?php if($user=='ooary') : echo 'admin-wisata@gmail.com' ; endif;?>" name="email" class="form-control" placeholder="email" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?>>
			<?php if($user=='ooary') : ?>
			<input type="hidden"  value="admin-wisata@gmail.com" name="email" class="form-control" placeholder="email" >
		<?php endif;?>
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-3">
			<input type="text"  value="<?php if($user=='ooary') : echo 'wisata-palembang.com' ; endif;?>" name="web" class="form-control" placeholder="web" <?php if($user=='ooary') : echo 'disabled' ; else : echo "required"; endif;?>>
			<?php if($user=='ooary') : ?>
				<input type="hidden"  value="wisata-palembang.com" name="web" class="form-control" placeholder="web" >
				<?php endif;?>
		</div>
	</div>
	<div class="form-group">
			<div class="col-md-5">
			<textarea name="komentar" class="form-control" rows="5" cols="5" placeholder="komentar"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-2">
		<input type="hidden" value="<?php echo $id ; ?>" name="idartikel">
			<input type="submit" class="btn btn-primary" value="komentar"> 
		</div>
	</div>


</form>
</div><!-- end of col - md - 12 -->

</div><!-- end of row -fluid -->
</div><!-- end of col - md - 8 -->
</div><!-- end of row fluid -- >
