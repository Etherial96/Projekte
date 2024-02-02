<?php
session_start();
    if($_SESSION["bereich"] != 6)
    {
		header("Location: login_form.php");
	}
?>
<!DOCTYPE html>
<html lang="de">
<head>

<title> Wiedereinstieg des Tests </title>
<link rel="stylesheet" href="..\CSS\auswertung_styles.css">
<!--<link rel="stylesheet" href="..\CSS\login_styles.css">  CSS here -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<input style="position: absolute; top: 2em; font-size: 1vw;" id="searchquest" type="text" onKeyUp="searching(this.value);" placeholder="Suche">
<form action="Einstellungstestaufruf.php" method="post">
	<p id="ausgabe" style="position: absolute; top: 2em;"></p>
	<input style="font-size: 1vw; position: absolute; top: 2em; left: 85em;" type="submit" value="Wiedereinstieg"/>
</form>
</body>
</html>

<script>
	var abfrage = new XMLHttpRequest();

	function searching(suchbegriff) 
	{
		var search = suchbegriff;

  		abfrage.open("GET", "ajaxwiederaufnahme.php?searchnow="+ search, true);
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
	function aufnahmetest(idnumber)
	{
		var teilbereich = 3;
		window.open(href="Einstellungstestaufruf.php?idToLoad=" + idnumber+ "&bereich=" + teilbereich ,'win0');
		
	}
</script>
