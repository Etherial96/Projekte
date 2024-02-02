<?php
	session_start();
	// Restrict Website Access only to logged users
	// If the user accessing this website is not logged in, it will redirect to login page back
	$_SESSION["bereich"] = 2;
	if($_SESSION["bereich"] != 2){
		header("Location: login_form.php");
	}
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
	<head>
	<!--<meta http-equiv="refresh" content="4">-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../CSS/teilnehmerformular.css" /> <!-- Holt sich die CSS datei aus dem Verzeichnis -->
		<title> Teilnehmerdaten </title>
	</head>

	<body id="bodies">
	<div id="loadmod" style="z-index: 5;">	
		<!-- Informationen zu den Einstellungstest -->		
		<div class="container" id="start">
			<img src="../Bilder/BeispielLogo.png" style="width: 60%; margin: 0 20%;"/>
			<h3 style="text-align: center; color: gray;" id="test">Testformular</h3>
			<form id="angaben" action="kontaktschnittstelle.php" method="post">
				<!-- Input felder befinden sich hier! -->
				<?php

				//echo('<META HTTP-EQUIV=Refresh CONTENT="1">');
				echo('<div style="width: 100%;">');
					echo('<input class="register" id="name" name="nachname" autocomplete="off" type="text" placeholder="Ihren Nachnamen eingeben" value="'.$_SESSION["nachname"].'"/>');
					echo('<input class="register" id="vorname" style="float: right;" name="vorname" autocomplete="off" type="text" placeholder="Ihren Vornamen eingeben" value="'.$_SESSION["vorname"].'"/>');
				echo('</div>');
				echo('<div class="labels">');
					echo('<strong>');
						echo('<label for="name" style="float:left;">Name</label>');
						echo('<label for="vorname" style="margin-left: 34.5%;">Vorname</label>');
					echo('</strong>');
				echo('</div>');
				echo('<div class="inputs">');
					echo('<select style="width:35.3%;" class="register" id="abschluss" name="qualifikation" autocomplete="off" type="text" placeholder="Ihr Nachname eingeben"/>');
					echo('<option selected disabled >Qualifikation</option>');
					echo('<option');if($_SESSION["quali"] == "Master"){echo(" selected ");}echo('>Master</option>');
					echo('<option');if($_SESSION["quali"] == "Bachelor"){echo(" selected ");} echo('>Bachelor</option>');
					echo('<option');if($_SESSION["quali"] == "Abitur"){echo(" selected ");} echo('>Abitur</option>');
					echo('<option');if($_SESSION["quali"] == "Fachabitur"){echo(" selected ");} echo('>Fachabitur</option>');
					echo('<option');if($_SESSION["quali"] == "Realschulabschluss"){echo(" selected ");} echo('>Realschulabschluss</option>');
					echo('<option'); if($_SESSION["quali"] == "Hauptschulabschluss"){echo(" selected ");} echo('>Hauptschulabschluss</option>');
					echo('<option');if($_SESSION["quali"] == "Sonstige"){echo(" selected ");} 
					echo('>Sonstige</option>');
					echo('<input class="register" style="float: right;" id="geburtsdatum" name="geburtsdatum" autocomplete="off" type="date" value="'.$_SESSION["geburtsdate"].'"/>');
				echo('</div>');
				echo('<div class="labels">');
					echo('<strong>');
						echo('<label style="float: left;" for="abschluss">Voraus. Bildungsabschluss</label>');
						echo('<label style="margin-left: 9.2%;" for="geburtsdatum">Geburtsdatum</label>');
					echo('</strong>');
				echo('</div>');
				echo('<div class="inputs">');
					echo('<input class="register" id="street" name="street" autocomplete="off" type="text" placeholder="Ihre Stra&szlig;e eingeben" value="'.$_SESSION["street"].'"/>');
					echo('<input class="register" id="plz" style="float: right;" name="plz" autocomplete="off" type="text" placeholder="Ihre Postleitzahl eingeben" value="'.$_SESSION["plz"].'"/>');
				echo('</div>');
		if($_SESSION["ortserror"] == 1 || $_SESSION["dsgvoerror"] == 1 ||$_SESSION["streeterror"] == 1 || $_SESSION["nachnameerror"] == 1 || $_SESSION["vornameerror"] == 1)
		{
			echo('<div style="box-shadow:inset 0 0 10px #000000; border:3px solid #DC143C; min-width:15em; text-align:center; position: absolute; left: 55em; top: 14.5em; line-height: 1%;">');
			if($_SESSION["ortserror"] == 1)
			{
				echo('<h6 style="color: red;">Geben Sie eine korrekte Postleitzahl an.</h6>');
			}
			if($_SESSION["dsgvoerror"] == 1)
			{
				echo('<h6 style="color: red;">Best&auml;tigen Sie die DSGVO.</h6>');
			}
			if($_SESSION["streeterror"] == 1)
			{
				echo('<h6 style="color: red;">Geben Sie Ihre Stra&szlig;e an.</h6>');
			}
			if($_SESSION["nachnameerror"] == 1)
			{
				echo('<h6 style="color: red;">Geben Sie Ihren Nachnamen an.</h6>');
			}
			if($_SESSION["vornameerror"] == 1)
			{
				echo('<h6 style="color: red;">Geben Sie Ihren Vornamen an.</h6>');
			}
			if($_SESSION["geburtsdate"] == 1)
			{
				echo('<h6 style="color: red;">Geben Sie Ihr Geburtsdatum an.</h6>');
			}
			echo('</div>');
		}
		?>
				<div class="labels">
					<strong>
						<label style="float: left;" for="street">Stra&szlig;e</label>
						<label style="margin-left: 37%;" for="plz">Postleitzahl</label>
					</strong>
				</div>
				<div class="inputs">
				<?php echo('<input id="dsgvo" name="dsgvo" type="checkbox" value="erlaubt" '.$_SESSION["dsgvo"].'/>') ?>
					<strong><label for="dsgvo" style="font-size: 74%;">Speicherung der Daten gem&auml;&szlig; </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  DSGVO erlauben.</label></strong>
					<input class="btn_effects" id="fertig" name="fertig" onclick="wait()" type="submit"  value="Speichern und beginnen"/>
				</div>
			</form>
		</div>
		<div>
			<table id="wait" style="z-index: 2; position:fixed; font-size: 2vw; left: 17em; top: 3em; visibility: hidden; border: 0px solid white; background-color: white;">
  				<tr>
  					<td style="font-size: 2vw; box-shadow: 0px 10px 40px silver; z-index: 9;">
 						<img id="load" style="width: 15em; height: 14em;" src="./Kaufleute2.0/Bilder/waitpic.gif" />
  					</td>
 				</tr>
			</table>
		</div>
		</div>
<script>

function wait()
{
	document.getElementById("loadmod").style.filter="blur(2px)";
	document.getElementById("bodies").style.maxWidth="100%";
	document.getElementById("bodies").style.width="100%";

	var abfrage = confirm("Auf OK wird der Test gestartet. Sind Sie sich sicher?");

	if (abfrage == false)
	{
		event.preventDefault();
		document.getElementById("loadmod").style.filter="";
		document.getElementById("wait").style.visibility="hidden";
		document.getElementById("logo").style.width="30%";
	}
	else if (abfrage == true)
	{
		document.getElementById("wait").style.visibility="visible";
		document.getElementById("wait").style.filter="blur(0px)";
		document.getElementById("load").style.filter="";
	}
}				
</script>
	</body>
</html>
