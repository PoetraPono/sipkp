<!DOCTYPE html>

<?php
	session_start();
	include("../config/connect.php");
	error_reporting(~E_ALL AND ~E_NOTICE);
	$user= $_SESSION['sesiuser'];

?>
<html>
	<head>
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<link rel="stylesheet" href=" ../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/rrssb.css" />
		<link href="../css/prettyPhoto.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
  		<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'></script>

  		
  		
</head>

	<body id="bg-color">
<nav class="navbar navbar-fixed-top" id="navbarcolor">
	<div class="container ">
	
		<div class="navbar-header" >
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="glyphicon glyphicon-off" ></span>
				
			</button>
			<a class="navbar-brand" href="index.php?btn=home">Wisata Palembang</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
			<ul class="nav navbar-nav ">
				<li ><a href="index.php" class="char-color">Home</a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle char-color" data-toggle="dropdown" role="button" aria-expanded="false" >Wisata <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" >
				<?php 
					$kategori=mysqli_query($koneksi,"SELECT id_kategori,kategori from kategori");
					while(list($id_kategori,$nama)=mysqli_fetch_row($kategori))
						:


				?>
						<li id="char-color"><a href="index.php?btn=kategori&id=<?php echo $id_kategori;?>" ><?php echo $nama ;?></a></li>

						<?php endwhile;?>
						
					</ul>
				</li>
				
			
			
				<li><a href="index.php?btn=peta" class="char-color">peta</a></li>
				<?php 
					$sejarah=mysqli_query($koneksi,"SELECT id_artikel from artikel where judul='kota Palembang'");
					list($idart)=mysqli_fetch_row($sejarah);

				?>
				<li><a href="index.php?btn=artikel&id=<?php echo $idart ;?>" class="char-color">sejarah</a></li>


				<?php
					if($user == "ooary")
						:
				?>
				<li><a href="../back/satpam/index.php" target="_blank" class="char-color">dashboard</a></li>
				<li ><a class="char-color">Hello ooary</a></li>
				<li ><a href="logout.php" class="char-color">Logout</a></li>


				
			<?php endif; ?>


			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
	<br>
	<div class="container" id="konten" >

		<?php
			$btn= $_GET['btn'];
			if($btn == 'kategori' )
				:
				include('kategori.php');
			elseif($btn=='artikel')
						:
				include('artikel.php');
			elseif($btn=='peta')
				:
			include('peta.php');
				elseif($btn=='deletekomentar')
				:
				include('config/deletekomentar.php');
				
			else
				:
			include('home.php');
			endif;


		?>





		

	</div>
	<div class="container">
   		<div class="row">
   			<div class="panel-footer">
   			<p align="center"><a href="http://twitter.com/ooary" target="_blank"><img src="img/twitter.png" width="32" height="32"></a></p>
   			<p class="text-muted">
	        <h5 align="center"><i class="text-muted">"Work hard in silence let your success make the noise"</i>
	        </p>
	        <i class="glyphicon glyphicon-copyright-mark"></i> ooary </h5>
   			</div>
   		
   		
		   </div>
			</div>
		 	

	<!-- java script -->

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
								
								
   								<script type="text/javascript" charset="utf-8">
									$(document).ready(function(){
									$("a[rel^='prettyPhoto']").prettyPhoto();
									});
									</script>

		

	</body>
	
  
   

</html>