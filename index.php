<?php 
include("scripts/dbconnect.php");
include("scripts/countweeks.php");
include("scripts/writelog.php");
if(isset($_GET["week"])){
	$startoftheweekday = date('Y-m-d',strtotime($_GET["week"]));
}else{
	$startoftheweekday = date('Y-m-d',strtotime("monday this week"));
}
include("scripts/startofcourses.php");
include("scripts/countweeks.php");
include("scripts/sidenav.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<?php
		include("head.php");
		?>
	</head>
	<body>
		<div class="maindiv">

				<?php
				include("scripts/main.php");
				?>

		</div> <!-- maindiv -->
		<div class="foot">&copy;Jan Hartje <a href="impressum.php" title="Impressum" target="_new">Impressum</a></div>
		<div class="foot"><a href="https://www.do.de/?aff=3b4NMQTuUr" title="do.de - Domain-Offensive - Domains für alle und zu super Preisen" target="_new">do.de - Domain-Offensive - Domains für alle und zu super Preisen</a></div>
  </body>
</html>