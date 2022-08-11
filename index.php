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
			<img src="galerije/logo3.jpg" alt="Biser">
		</div>
		
		
	
	</div><!-- end #header -->
	
	<div id="nav">
	
		<ul>
			<li><a href="index.php">Početna</a></li>
			<?php
			$upit="SELECT * FROM kategorija";
			$rez=$db->izvrsiUpit($upit);
			while($red=$db->procitajRed($rez))
			{
				echo "<li><a href='index.php?idKategorije=$red->id'>$red->naziv</a></li>";
			}
			?>
			
			<li><a href="usluge.php">Usluge</a></li>
			<li><a href="kontakt.php">Kontakt</a></li>
			<li><a href="katalog.php">Galerija</a></li>
			
		</ul>
		
		
	
	</div><!-- end #nav -->
	
	<div id="main2">
	
	
	
		
	
	</div><!-- end #main -->
	
	<div id="sidebar2">
	<?php
	$upit="SELECT * FROM proizvodi WHERE obrisan=0  ";
	if(isset($_GET['idProizvoda'])) $upit="SELECT * FROM proizvodi WHERE obrisan=0 and id=".$_GET['idProizvoda'];
	if(isset($_POST['pretraga'])) $upit="SELECT * FROM proizvodi WHERE obrisan=0 and (opisProizvoda LIKE ('%".$_POST['pretraga']."%') or naziv LIKE ('%".$_POST['pretraga']."%')or ime LIKE ('%".$_POST['pretraga']."%'))";
	$rez=$db->izvrsiUpit($upit);
	while($red=$db->procitajRed($rez))
	{
		echo "<h2><a href='index.php?idProizvoda=$red->id'>".$red->naziv."</a></h2>";
		if($red->slikaproizvoda!="")echo "<img src='slike/$red->slikaproizvoda' width='150px' alt='slika'/><br><br>";
		
		
		if(isset($_POST['pretraga']))
		{
			$red->opisProizvoda=str_replace($_POST['pretraga'], "<span style='background-color: yellow; color: red'>".$_POST['pretraga']."</span>", $red->opisProizvoda);
		}
		

		if(isset($_GET['idProizvoda']))
			echo "<text-align: right;>" .$red->opisproizvoda."<br><br>";
		
		
		
	}
	?>
	
	</div><!-- end #sidebar -->
	
	<div id="footer">
		<p>Copyright &copy; Biser 2018</p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>










