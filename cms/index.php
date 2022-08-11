<?php
require_once("../klase/classBaza.php");
require_once("funkcije.php");
$db=new Baza();
if(isset($_GET['logout']))
{
	session_start();
	unset($_SESSION['id']);
	session_destroy();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Biser MDS</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link href="../fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<link href="../css/style.css" type="text/css" rel="stylesheet">
<script src="../jquery-3.3.1.js"></script>

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
			<li><a href="../index.php">Pocetna</a></li>
			<?php
			$upit="SELECT * FROM kategorija";
			$rez=$db->izvrsiUpit($upit);
			
			?>
			
		</ul>
	
	</div><!-- end #nav -->
	
	<div id="main">
	
	
	</div><!-- end #main -->
	
	
	
	<div id="footer">
		<p>Copyright &copy; Biser 2018</p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>












