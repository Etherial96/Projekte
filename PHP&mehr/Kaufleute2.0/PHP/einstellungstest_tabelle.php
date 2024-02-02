<?php 
	session_start();

    // Restrict Website Access only to logged users
	// If the user accessing this website is not logged in, it will redirect to login page back
	if($_SESSION['bereich'] != 1)
	{
		header("Location: login_form.php");
	}
	else if($_SESSION['bereich'] == 1)
	{
		$_SESSION['abmelden'] = 9;
	}

	include_once ("datenbankverbindung.php");

?>
<!DOCTYPE html>
<html lang="de"> 
<head>
	<title>Anzeige Einstellungstest</title>
	<link rel="stylesheet" href="..\CSS\auswertung_styles.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<script src="../js/auswertung.js"></script>-->
</head>
<body>
<!-- Alle Tests -->
	<h1 id="headline" style="text-align: center;">&Uuml;berblick der Einstellungstests</h1><!-- Header Text -->
	<input style="position: absolute; top: 2em; font-size: 1vw;" id="searchquest" type="text" onKeyUp="searching(this.value);" placeholder="Suche">
	<form action="logout.php" method="post">
		<input class="btn_effects" id="logouts" name="fertig" type="submit" value="Abmelden"/>
	</form>
	<!-- Hauptbody der gesamten Webseite -->
	<div id="Hauptbody" style="height: 5em;"> <!-- DIV Hauptbody ID f�r die Farbenkonvertierung notwendig -->
		<nav> <!-- Nav Element f�r das Men� -->
			<ul style="padding-left: 0;"> <!-- Unordered list hier -->
				<!-- 1. Liste E-Commerce -->
				<li>
				<p style="position: absolute; top: 3em; left: 5.8em;text-align: center; color: white;">E-Commerce</p>
				<select id="ecdate" style="position: absolute; top: 7.7em; width: 25em; height: 3em; font-size: 1.2vw; color: white; border: 1px solid black; text-align: center; background-color: dodgerblue;"onchange="ecdate()">
					<option>Auswahl Jahr</option>
					<?php
						$teilidname = 'ecdate';
						$teilbereichid = 4;
						extractyear($teilbereichid);
					?>
				</select>
				</li>
				
				<li>
				<p style="position: absolute; top: 3em; left: 24.6em;text-align: center; color: white;">Informatik</p>
				<select id="fadate" style="position: absolute; top: 7.7em; width: 25em; height: 3em; font-size: 1.2vw; color: white; border: 1px solid black; text-align: center; background-color: dodgerblue;"onchange="fadate()">
					<option>Auswahl Jahr</option>
					<?php
						$teilidname = 'fadate';
						$teilbereichid = 1;
						extractyear($teilbereichid);
					?>
				</select>
				</li>
				<p style="position: absolute; top: 3em; left: 40.8em;text-align: center; color: white;">Gro&szlig;- & Au&szlig;enhandel</p>
				<li><select id="gadate" style="position: absolute; top: 7.7em; width: 25em; height: 3em; font-size: 1.2vw; color: white; border: 1px solid black; text-align: center; background-color: dodgerblue;"onchange="gadate()">
					<option>Auswahl Jahr</option>
							<?php
							$teilidname = 'gadate';
							$teilbereichid = 2;
							extractyear($teilbereichid);
							?>
							</select>
				</li>
			</ul>
		</nav>
		<p id="ausgabe"> </p>
	</div>
</body>
</html>
<?php
function extractyear($teilid, $teilname)
{	
	global $dbh;		
	$emptycheck;
	$timeline = 2020;
	$timecheck = $timeline +1;
	$resultspeicher = array();
	$result = 0;
	
	for($timeline; $timeline < $timecheck; $timeline++)
	{	
 		//extract (year from startzeit)
		$stmt2 = $dbh->prepare('select extract(year from startzeit) from teilnehmerdaten where extract(year from startzeit) = :timeline and fachbereichid = :teilid');
		$stmt2->bindParam(':timeline', $timeline);
		$stmt2->bindParam(':teilid', $teilid);
		$stmt2->execute();
		$resultspeicher[$result] = $stmt2->fetchColumn(0);				
		if(empty($resultspeicher[$result]) == empty($emptycheck))
		{
			break;
		}
		else
		{
			echo('<option value="'.$resultspeicher[$result].'"><a name="'.$teilname.'">Jahr '.$resultspeicher[$result].'<a/></option>');
			$timecheck++;
		}
		$result++;
	}
}
?>

<script>
	var abfrage = new XMLHttpRequest();

	function searching(suchbegriff) 
	{
		var search = suchbegriff;

  		abfrage.open("GET", "tabellentaskajax.php?searchnow="+ search, true);
  		abfrage.send();

  		// Auf eine Antwort wartens
		abfrage.onreadystatechange = function()
  		{	
			if (abfrage.readyState == 4 && abfrage.status == 200)
   			{ 
				// Die Antwort des Servers ausgeben
				document.getElementById("ausgabe").innerHTML = abfrage.responseText; 
			}
		}
	}
 
   function gadate() {

   var gadate = 'gadate';
   var jahr = document.getElementById("gadate").value;
    //var datesuche = document.getElementByName("edate").innerHTML;
     abfrage.open("GET", "tabellentaskajax.php?fachbereich="+ gadate +"&year=" + jahr, true);
     abfrage.send();
     // Auf eine Antwort wartens
     abfrage.onreadystatechange = function() {
      if (abfrage.readyState == 4 && abfrage.status == 200) {
 
       // Die Antwort des Servers ausgeben
       document.getElementById("ausgabe").innerHTML = abfrage.responseText;
      }
     }
   }
   function fadate() {

	var jahr = document.getElementById("fadate").value;
	var fadate = 'fadate';
 	//var datesuche = document.getElementByName("edate").innerHTML;
 	 abfrage.open("GET", "tabellentaskajax.php?fachbereich=" + fadate + "&year=" + jahr, true);
 	 abfrage.send();

 	// Auf eine Antwort warten
 	abfrage.onreadystatechange = function()
	{
  		if (abfrage.readyState == 4 && abfrage.status == 200) 
		{
			// Die Antwort des Servers ausgeben
			document.getElementById("ausgabe").innerHTML = abfrage.responseText;
  		}
  	}
}
function ecdate() {

	var jahr = document.getElementById("ecdate").value;
	var ecdate = 'ecdate';

	abfrage.open("GET", "tabellentaskajax.php?fachbereich=" + ecdate + "&year=" + jahr, true);
	abfrage.send();

	// Auf eine Antwort wartens
	abfrage.onreadystatechange = function() 
	{
		if (abfrage.readyState == 4 && abfrage.status == 200)
		{
			// Die Antwort des Servers ausgeben
			document.getElementById("ausgabe").innerHTML = abfrage.responseText;
   		}
  	}
}
function teilnehmereinsicht(idnumber)
{
	window.open(href="teilnehmerbearbeitung.php?idToLoad=" + idnumber,'win1');
}

   </script>