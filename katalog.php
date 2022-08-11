<?php
session_start();
require_once("klase/classBaza.php");
$db=new Baza();
if(mysqli_connect_error())
{
	echo "Baza nije dostupna!!!!";
	exit();
}

?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Biser MDS</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="jquery-3.3.1.js"></script>
<script>
	$(document).ready(function (){
		$("img").click(function(){
			var src=$(this).attr("src");
			$("#glavna"). hide().stop().attr("src",src).css("opacity","0").show().animate({opacity:"1"}, 1000);
		});
	});
</script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link href="fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="lightbox2-master/src/css/lightbox.css" rel="stylesheet">
<script src="lightbox2-master/dist/js/lightbox-plus-jquery.js"></script>

</head>

<body>

<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<img src="slike/logo.jpg" alt="Biser">
		</div>
		
		
	
	</div><!-- end #header -->
	
	<div id="nav">
	
		<ul>
			<li><a href="index.php">Pocetna</a></li>
			<?php
			$upit="SELECT * FROM kategorija";
			$rez=$db->izvrsiUpit($upit);
			while($red=$db->procitajRed($rez))
			{
				echo "<li><a href='index.php?idKategorija=$red->id'>$red->naziv</a></li>";
			}
			
			?>
			<li><a href="usluge.php">Usluge</a></li>
			<li><a href="kontakt.php">Kontakt</a></li>
			<li><a href="katalog.php">Galerija</a></li>
		</ul>
		
		
		
	
	</div><!-- end #nav -->
	
	<div id="main">
	<?php
	$upit="SELECT * FROM galerije order by vreme desc";
	$rez=$db->izvrsiUpit($upit);
	if($db->brojRedova($rez)>0)
	{
		echo "<ul>";
		while($red=$db->procitajRed($rez))
			echo "<li><a href='katalog.php?idGalerije=$red->id'>$red->nazivGalerije</a></li>";
		echo "</ul>";
	}else
		echo "Nema ni jedna galerija u bazi!!!!<br>";
	?>
	<center>
	
	
	<?php
	if(isset($_GET['idGalerije']))
	{
		$idGalerije=$_GET['idGalerije'];
		$upit="SELECT * FROM galerijeslike WHERE idGalerije=$idGalerije";
		$rez=$db->izvrsiUpit($upit);
		if($db->brojRedova($rez)>0)
		{
			while($red=$db->procitajRed($rez))
				echo "<a href='galerije/$red->slika' data-lightbox='roadtrip' data-title='$red->komentar'><img  src='galerije/$red->slika' alt='Nema slike' height='200px' class='galerija' /></a>";
				
		}else
			echo "Nema nijedna slika za izabranu galeriju!!!!<br>";
	}
	?>
	</center>
		
	</div><!-- end #main -->
	
	<div id="sidebar">
	
		
	</div><!-- end #sidebar -->
	
	<div id="footer">
		<p>Copyright &copy; Biser 2018</p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>












