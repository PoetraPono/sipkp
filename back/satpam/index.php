<!DOCTYPE html>
<html>
	<?php
		session_start();
		error_reporting(~E_ALL AND ~E_NOTICE);
		include("../../config/connect.php"); 
		include("secure/hansip.php");
	?>

	<head>


				<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/dashboard.css">
 




	</head>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="../../js/jquery.min.js"></script>
	

		
	
	<body >

		<div class="container" id="bg-color">
			<div class="row-fluid">
			<br>
						<div class="jumbotron">
							<h1>Welcome back, <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['sesiuser']; ?> !</h1>
							<h3>You can do something at here</h3>
						</div>

	<nav class="navbar navbar-default" id="navbar-color">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="btn-primary">
            <span class="sr-only">Toggle navigation</span>
            <span class="glyphicon glyphicon-off"></span>
		            
          </button>
      
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav ">
            				<li><a href="index.php" class="glyphicon glyphicon-home" id="char-color"> Dashboard</a></li>
							<li><a href="index.php?btn=view" class="glyphicon glyphicon-eye-open" id="char-color"> Daftar artikel</a></li>							
							<li><a href="index.php?btn=komentar" class="glyphicon glyphicon-comment" id="char-color"> Komentar</a></li>
							<li><a href="index.php?btn=kategori" class="glyphicon glyphicon-comment" id="char-color"> kategori</a></li>

							<li><a href="index.php?btn=peta" class="glyphicon glyphicon-map-marker" id="char-color"> Peta</a></li>
							<li><a href="index.php?btn=profile" class="glyphicon glyphicon-map-marker" id="char-color"> profile</a></li>

							<li><a href="secure/logout.php" class=" glyphicon glyphicon-off" id="char-color"> Logout</a></li>
         	 </ul>
          </div>
      </div>
    </nav>
</div>

				<?php
					$btn= $_GET['btn'];
					if($btn=='view')
						:
							include('view/view.php');
					elseif($btn==='add')
						:
							include('add/add.php');
					elseif($btn=='komentar')
						:
					include('komentar/komentar.php');
					elseif($btn=='deleteedit')
						:
							include('view/delete.php');
					elseif($btn=='profile')
						:
					include('profile/view.php');
					elseif($btn=='editprofile')
						:
					include('profile/edit.php');
					elseif($btn=='kategori')
						:
					include('kategori/view.php');
					elseif($btn=='editkategori')
						:
					include('kategori/edit.php');
					elseif($btn=='hapuskategori')
						:
					include('kategori/delete.php');
					elseif($btn=='addgambar')
						:
					include('add-gambar/view.php');
					elseif($btn=='hapuspeta')
						:
					include('peta/delete.php');
					elseif($btn=='hapusgambar')
						:
					include('add-gambar/delete.php');
					elseif($btn=='editgambar')
						:
					include('add-gambar/edit-gambar.php');
					elseif($btn=='editartikel')
							:
						include('view/edit.php');	
					elseif($btn=='lihat')
							:
						include('view/view-artikel.php');
					elseif($btn=='hapuskomentar')
							:
						include('komentar/delete.php');	
					elseif($btn=='editkomentar')
							:
					include('komentar/edit.php');		
					elseif($btn=='peta')
							:
					include('peta/view.php');
					elseif($btn=='editpeta')
							:
					include('peta/edit.php');
					
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

		
		





		<!--- javascript -->


<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	</body>
	

</html>