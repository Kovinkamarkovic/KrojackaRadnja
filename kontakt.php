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

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link href="fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<link href="css/style.css" type="text/css" rel="stylesheet">

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
	
		
	</div><!-- end #main -->
	
	<div id="sidebar">
	
		
		
		<div class="block">
			
			<img src="slike/17.jpg" alt="">
			
		</div>
	
	</div><!-- end #sidebar -->
	
	<div id="footer">
		<p>Copyright &copy; Biser 2018 </p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>












