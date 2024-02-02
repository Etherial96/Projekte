<?php
	session_start();
	// Restrict Website Access only to logged users
	// If the user accessing this website is not logged in, it will redirect to login page back
	if($_SESSION["bereich"] != 3){
		header("Location: login_form.php");
	}
	?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../CSS/Einstellungstestdesign.css" /> <!-- Holt sich die CSS datei aus dem Verzeichnis -->
		<title> Einstellungstest </title>
	</head>

	<body id="bodies">
		<!--Headertexte befinden sich hier!-->
		<h2 id="achtung"> Achtung! Wichtige Hinweise zur Bearbeitung! </h2>
		<h3 id="test"> Einstellungstest f&uuml;r Kaufmann/-frau im Gro&szlig;- und Au&szlig;enhandel </h3>
		
		<!--Liste der einzelnen Aufgaben nach links verschoben -->
		<div id="aufgaben_weiterleitung">
			<a class="aufg_weit" href="#start"> Start </a>
			<a class="aufg_weit" href="#aufgabe1"> Aufgabe 1 </a>
			<a class="aufg_weit" href="#aufgabe2"> Aufgabe 2 </a>
			<a class="aufg_weit" href="#aufgabe3"> Aufgabe 3 </a>
			<a class="aufg_weit" href="#aufgabe4"> Aufgabe 4 </a>
			<a class="aufg_weit" href="#aufgabe5"> Aufgabe 5 </a>
			<a class="aufg_weit" href="#aufgabe6"> Aufgabe 6 </a>
			<a class="aufg_weit" href="#aufgabe7"> Aufgabe 7 </a>
			<a class="aufg_weit" href="#aufgabe8"> Aufgabe 8 </a>
			<a class="aufg_weit" href="#aufgabe9"> Aufgabe 9 </a>
			<a class="aufg_weit" href="#aufgabe10"> Aufgabe 10 </a> 
			<a class="aufg_weit" href="#aufgabe11"> Aufgabe 11 </a> 
			<a class="aufg_weit" href="#aufgabe12a"> Aufgabe 12 </a>
			<a class="aufg_weit" href="#aufgabe13"> Aufgabe 13 </a>
			<a class="aufg_weit" href="#aufgabe14"> Aufgabe 14 </a>
			<a class="aufg_weit" href="#aufgabe15"> Aufgabe 15 </a>
			<a class="aufg_weit" href="#aufgabe16"> Aufgabe 16 </a>
			<a class="aufg_weit" href="#aufgabe17"> Aufgabe 17 </a>
			<a class="aufg_weit" href="#aufgabe18"> Aufgabe 18 </a>
			<a class="aufg_weit" href="#aufgabe19"> Aufgabe 19 </a>
			<a class="aufg_weit" href="#aufgabe20"> Aufgabe 20 </a>
			<a class="aufg_weit" href="#aufgabe21"> Aufgabe 21 </a>
			<a class="aufg_weit" href="#aufgabe22"> Aufgabe 22 </a>
			<a class="aufg_weit" href="#aufgabe23"> Aufgabe 23 </a>
			<a class="aufg_weit" href="#aufgabe24"> Aufgabe 24 </a>
			<a class="aufg_weit" href="#aufgabe25"> Aufgabe 25 </a>
		</div>

		<!-- Informationen zu den Einstellungstest -->
		<div style="text-align:center;" id="start">
			<!-- Input felder befinden sich hier! -->

			<!-- Zwei Paragraphen mit unterschiedlichen id's angegeben, wegen Textverarbeitung -->
			<p id="hinweis_2">
				F&uuml;r die Bearbeitung der Aufgaben stehen Ihnen 120 Minuten Zeit zur Verf&uuml;gung. Die Aufga-<br />
				ben sollten zwar z&uuml;gig, aber sorgf&auml;ltig bearbeitet werden. Daher empfehlen wir Ihnen, zu-<br />
				n&auml;chst die Aufgaben zu machen die Ihnen leicht erscheinen. Stellen Sie die Aufgabenstellun-<br />
				gen, die Ihnen besonders schwer fallen zun&auml;chst zur&uuml;ck, um sie dann im zweiten Durchgang<br />
				zu l&ouml;sen.
			</p>

			<h3 id="erfolg"> Viel Erfolg! </h3>
			<img style="top: 44em; left: 45.6em; position:absolute; width:10%;" src="../Bilder/anfang_einstellungstest.png"/>
		</div>

		<!-- Aufgaben fangen hier an! -->
		<div style="position: absolute; top: 60em; left: 16.5em; color: #4f81bd; width: 50%;">

			<!-- Teilbereich 1 -->
			<div>
				<h1 style="font-size: 2.4vw; position: absolute; background-color: #ffff00;">Teil I (allgemeiner Bereich)</h1>
				<form action="datenschnittstelle.php" method="post">
				<!-- Aufgabe 1 -->
				<div id="aufgabe1" style="top: 6em;" class="aufgaben">
					<img style="width: 100%;" src="../Bilder/aufgabe1.png" />
					<input style="position: absolute; top: 3.5em; left: 49.5em; min-height: 2.3em;" class="inputform registrierdesign" autocomplete="off" type="text" name="1.01" />
				</div>

				<!-- Aufgabe 2 -->
				<div id="aufgabe2" style="top: 34em;" class="aufgaben">
				
					<img style="width: 100%;" src="../Bilder/aufgabe2.png" />
					<input style="position:absolute; top: 8.9em; left: 46em;" class="inputform registrierdesign" autocomplete="off" type="text" name="2.01"/>
					<input style="position:absolute; top: 12.9em; left: 46em;" class="inputform registrierdesign" autocomplete="off" type="text" name="2.02" />
					<input style="position:absolute; top: 17em; left: 46em;" class="inputform registrierdesign"	autocomplete="off"  type="text" name="2.03" />
					<input style="position:absolute; top: 21em; left: 46em;" class="inputform registrierdesign" autocomplete="off"  type="text" name="2.04" />
					<input style="position:absolute; top: 25.1em; left: 46em;" class="inputform registrierdesign" type="text" name="2.05" />
					<input style="position:absolute; top: 29.2em; left: 46em;" class="inputform registrierdesign" type="text" name="2.06" />
					
				</div>

				<!-- Aufgabe 3 Info -->
				<div id="aufgabe3" style="top: 66em;" class="aufgaben">
					<img style="width: 100%;" src="../Bilder/aufgabe3_1.png" />
				</div>

				<!-- Aufgabe 3 Eingabefelder -->
				<div style="top: 86em;" class="aufgaben">
					<img style="width:100%;" src="../Bilder/aufgabe3_2.png" />
					<input style="position: absolute; top: 0.2em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.01" />
					<input style="position: absolute; top: 3.2em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.02" />
					<input style="position: absolute; top: 6.2em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.03" />
					<input style="position: absolute; top: 9.1em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.04" />
					<input style="position: absolute; top: 11.9em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.05" />
					<input style="position: absolute; top: 14.8em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.06" />
					<input style="position: absolute; top: 17.6em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.07" />
					<input style="position: absolute; top: 20.5em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.08" />
					<input style="position: absolute; top: 23.4em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.09" />
					<input style="position: absolute; top: 26.3em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.1" />
					<input style="position: absolute; top: 29.1em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.11" />
					<input style="position: absolute; top: 32em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.12" />
					<input style="position: absolute; top: 34.9em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.13" />
					<input style="position: absolute; top: 37.8em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.14" />
					<input style="position: absolute; top: 40.5em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.15" />
					<input style="position: absolute; top: 43.6em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.16" />
					<input style="position: absolute; top: 46.5em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.17" />
					<input style="position: absolute; top: 49.3em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3.18" />
				</div>
				
				<!-- Aufgabe 4 -->
				<div id="aufgabe4" style="top: 131em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe4.png" />
					<input style="position: absolute; top: 9.15em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.01" />
					<input style="position: absolute; top: 12.1em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.02" />
					<input style="position: absolute; top: 14.95em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.03" />
					<input style="position: absolute; top: 17.8em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.04" />
					<input style="position: absolute; top: 20.64em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.05" />
					<input style="position: absolute; top: 23.5em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.06" />
					<input style="position: absolute; top: 26.25em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.07" />
					<input style="position: absolute; top: 29.08em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4.08" />
				</div>
				<!-- Aufgabe 5 -->
				<div id="aufgabe5" style="top: 161em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe5.png" />
					<input style="position: absolute; top: 11.2em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.01" />
					<input style="position: absolute; top: 14.1em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.02" />
					<input style="position: absolute; top: 17em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.03" />
					<input style="position: absolute; top: 20em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.04" />
					<input style="position: absolute; top: 22.8em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.05" />
					<input style="position: absolute; top: 25.8em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.06" />
					<input style="position: absolute; top: 28.7em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.07" />
					<input style="position: absolute; top: 31.6em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.08" />
					<input style="position: absolute; top: 34.6em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5.09" />
				</div>

				<!-- Aufgabe 6 Info-->
				<div id="aufgabe6" style="top: 193em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe6_1.png" />
				</div>

				<!-- Aufgabe 6 Eingabefelder -->
				<div style="top: 213em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe6_2.png" />
					<input style="position: absolute; top: 0.3em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.01" />
					<input style="position: absolute; top: 3em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.02" />
					<input style="position: absolute; top: 5.6em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.03" />
					<input style="position: absolute; top: 8.3em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.04" />
					<input style="position: absolute; top: 10.9em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.05" />
					<input style="position: absolute; top: 13.60em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.06" />
					<input style="position: absolute; top: 16.2em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.07" />
					<input style="position: absolute; top: 18.9em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6.08" />
				</div>

				<!-- Aufgabe 7 Info-->
				<div id="aufgabe7" style="top: 233em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe7_1.png" />
				</div>

				<!-- Aufgabe 7 Eingabefelder -->
				<div style="top: 246em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe7_2.png" />
					<input style="top: 0.2em; left: 41.9em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7.01" />
					<input style="top: 2.95em; left: 41.9em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7.02" />
					<input style="top: 5.6em; left: 41.9em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7.03" />
					<input style="top: 8.3em; left: 41.9em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7.04" />
					<input style="top: 11em; left: 41.9em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7.05" />
				</div>

				<!-- Aufgabe 8 Info -->
				<div id="aufgabe8" style="top: 262em;" class="aufgaben">
					<img style="width: 100%" src="..\Bilder\aufgabe8_1.png" />
				</div>

				<!-- Aufgabe 8 Deutschlandskarte -->
				<div style="top: 267em;" class="aufgaben">
					<img style="width: 100%" src="..\Bilder\aufgabe8_2.png" />																 <!-- Untere Kommentare nach der Bearbeitung mit PHP SOFORT LOESCHEN! -->
					<input style="position: absolute; left: 5em; top: 44.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.01" /> <!-- Saarland -->
					<input style="position: absolute; left: 7em; top: 40em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.02" /> <!-- Rheinland Pfalz -->
					<input style="position: absolute; left: 8em; top: 28em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.03" /> <!-- Nordrhein-Westfalen -->
					<input style="position: absolute; left: 16em; top: 51em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.04" /> <!-- Baden-W�rttemberg -->
					<input style="position: absolute; left: 30em; top: 47em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.05" /> <!-- Bayern -->
					<input style="position: absolute; left: 16em; top: 35em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.06" /> <!-- Hessen -->
					<input style="position: absolute; left: 27em; top: 32em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.07" /> <!-- Tr�ringen -->
					<input style="position: absolute; left: 30.5em; top: 24em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.08" /> <!-- Sachsen-Anhalt -->
					<input style="position: absolute; left: 40em; top: 31em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.09" /> <!-- Sachsen -->
					<input style="position: absolute; left: 42em; top: 24em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.1" /> <!-- Brandenburg -->
					<input style="position: absolute; left: 39.4em; top: 19.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.11" /> <!-- Berlin -->
					<input style="position: absolute; left: 19em; top: 18em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.12" /> <!-- Niedersachsen -->
					<input style="position: absolute; left: 15.7em; top: 13.2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.13" /> <!-- Bremen -->
					<input style="position: absolute; left: 22em; top: 11em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.14" /> <!-- Hamburg -->
					<input style="position: absolute; left: 20em; top: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.15" /> <!-- Schleswig-Holstein -->
					<input style="position: absolute; left: 35em; top: 10em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8.16" /> <!-- Mecklenburg-Vorpommern -->
				</div>

				<!-- Aufgabe 8 Eingabefelder Teil B -->
				<div style="top: 315em;" class="aufgaben"> 
					<img style="width: 100%" src="..\Bilder\aufgabe8_3.png" />
					<input style="top: 2.55em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.01" />
					<input style="top: 4.97em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.02" />
					<input style="top: 7.38em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.03" />
					<input style="top: 9.80em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.04" />
					<input style="top: 12.25em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.05" />
					<input style="top: 14.63em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.06" />
					<input style="top: 16.98em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.07" />
					<input style="top: 19.37em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.08" />
					<input style="top: 21.77em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.09" />
					<input style="top: 24.20em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.1" />
					<input style="top: 26.65em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.11" />
					<input style="top: 29.04em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.12" />
					<input style="top: 31.47em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.13" />
					<input style="top: 33.9em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.14" />
					<input style="top: 36.26em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.15" />
					<input style="top: 38.61em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="27.16" />
				</div>

				<!-- Aufgabe 9 -->
				<div id="aufgabe9" style="top: 350em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe9.png" />
					<input style="top: 10.9em; left: 40.18em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9.01" />
					<input style="top: 13.2em; left: 40.18em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9.02" />
					<input style="top: 15.45em; left: 40.18em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9.03" />
					<input style="top: 17.7em; left: 40.18em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9.04" />
					<input style="top: 20em; left: 40.18em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9.05" />
				</div>

				<!-- Aufgabe 10 -->
				<div id="aufgabe10" style="top: 373em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe10.png" />
					<input style="top: 4.65em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.01" />
					<input style="top: 7.15em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.02" />
					<input style="top: 9.66em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.03" />
					<input style="top: 12.11em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.04" />			
					<input style="top: 14.57em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.05" />
					<input style="top: 17.07em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.06" />
					<input style="top: 20.10em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.07" />
					<input style="top: 23.05em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.08" />
					<input style="top: 25.55em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.09" />
					<input style="top: 28.03em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.1" />
					<input style="top: 30.55em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.11" />
					<input style="top: 33.08em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.12" />
					<input style="top: 35.57em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.13" />
					<input style="top: 37.97em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10.14" />
				</div>

				<!-- Aufgabe 11 Info -->
				<div id="aufgabe11" style="top: 411em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe11_1.png" />
				</div>

				<!-- Aufgabe 11 Eingabefelder -->
				<div style="top: 425em;" class="aufgaben"> 
					<img style="width: 100%;" src="..\Bilder\aufgabe11_2.png" />
					<input style="top: 0.225em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.01" />
					<input style="top: 2.85em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.02" />
					<input style="top: 5.5em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.03" />
					<input style="top: 8.1em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.04" />
					<input style="top: 10.75em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.05" />
					<input style="top: 13.35em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.06" />
					<input style="top: 16em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.07" />
					<input style="top: 18.65em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.08" />
					<input style="top: 21.25em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.09" />
					<input style="top: 23.9em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.1" />
					<input style="top: 26.55em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.11" />
					<input style="top: 29.2em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.12" />
					<input style="top: 31.85em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.13" />
					<input style="top: 34.45em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.14" />
					<input style="top: 37.085em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11.15" />
				</div>

				<!-- Aufgabe 12 A)-->
				<div id="aufgabe12a" style="top: 460em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe12_1.png" />
					<input style="top: 11.4em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.01" />
					<input style="top: 14.2em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.02" />
					<input style="top: 17em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.03" />
					<input style="top: 19.7em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.04" />
					<input style="top: 22.5em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.05" />
					<input style="top: 25.2em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.06" />
					<input style="top: 28.1em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.07" />

					<input style="top: 11.4em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.08" />
					<input style="top: 14.2em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.09" />
					<input style="top: 17em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.1" />
					<input style="top: 19.7em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.11" />
					<input style="top: 22.5em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.12" />
					<input style="top: 25.2em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.13" />
					<input style="top: 28.1em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="28.14" />
					<input type="button" class="abgang"id="userblock" value="Absenden!" onClick="block();" />
				</div> 
				

				<!-- Aufgabe 12 B) -->
				<div style="top: 490em;" class="aufgaben" id="aufgabe12">
					<img style="width: 100%;" src="..\Bilder\aufgabe12_2.png" />								
					<ol style="position: absolute; left: 48em; top: 0em; color: black;">
						<li value="0">Finnland</li>
						<li>Spanien</li>
						<li>Deutschland</li>
						<li>Polen</li>
						<li>Italien</li>
						<li>Frankreich</li>
						<li>Niederlande</li>
						<li>Belgien</li>
						<li>Schweden</li>
						<li>Bulgarien</li>
						<li>Malta</li>
						<li>Litauen</li>
						<li>Lettland</li>
						<li>Estland</li>
						<li>Slowenien</li>
						<li>Kroatien</li>
						<li>Rumänien</li>
						<li>Griechenland</li>
						<li>Zypern</li>
						<li>Portugal</li>
					</ol>
					<!-- Sollen gelöscht werden! -->
					
					<input style="top: 15em; left: 35em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.01" /> <!-- Finnland -->
					<input style="top: 40.5em; left: 8.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.02" /> <!-- Spanien -->
					<input style="top: 30em; left: 23em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.03" /> <!-- Deutschland -->
					<input style="top: 29em; left: 31.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.04" /> <!-- Polen -->
					<input style="top: 41em; left: 25em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.05" /> <!-- Italien -->
					<input style="top: 34em; left: 16.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.06" /> <!-- Frankreich -->
					<input style="top: 27.5em; left: 20em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.07" /> <!-- Niederlande -->
					<input style="top: 29.8em; left: 19.8em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.08" /> <!-- Belgien -->
					<input style="top: 19em; left: 28em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.09" /> <!-- Schweden -->	
					<input style="top: 41.7em; left: 37em; min-height: 1.3em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12.1" /> <!-- Bulgarien -->
					<input style="top: 51em; left: 26em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.11"  /> <!--Malta-->
					<input style="top: 25em; left: 35.5em; min-height: 1.4em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12.12" /> <!-- Litauen -->
					<input style="top: 22.3em; left: 35.8em; min-height: 1.4em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12.13"  /> <!-- Lettland -->
					<input style="top: 20em; left: 36.2em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.14" /> <!--Estland-->
					<input style="top: 36.4em; left: 28em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.15" /> <!--Slowenien-->
					<input style="top: 38em; left: 29em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.16" /> <!-- Kroatien -->
					<input style="top: 37em; left: 37em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.17"  />	 <!-- Rumänien -->	
					<input style="top: 46.5em; left: 34.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.18" /> <!--Griechenland -->
					<input style="top: 50.5em; left: 44.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.19" /> <!--Zypern-->
					<input style="top: 40em; left: 3.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12.2" /> <!--Portugal-->
				</div>
			</div>

			<!-- Teilbereich 2 -->
			<div style="position: absolute; top: 535em; width: 100%;" >
				<h1 style="font-size: 2.4vw; background-color: #ffff00;">Teil II (mathematischer Bereich)</h1>

				<!-- Aufgabe 13 -->
				<div id="aufgabe13" style="top: 5em;" class="aufgaben">
				<img style="width: 100%;" src="..\Bilder\aufgabe13.png" />
					<input style="top: 7.1em; left: 36.5em; min-height: 2em; max-width: 10em; width: 10em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="       Euro" name="13.01" />
				</div>

				<!-- Aufgabe 14 -->
				<div id="aufgabe14" style="top: 18em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe14.png" />
					<input style="top: 10em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.01" />
					<input style="top: 12.75em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.02" />
					<input style="top: 15.475em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.03" />
					<input style="top: 18.15em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.04" />
					<input style="top: 20.8em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.05" />
					<input style="top: 23.5em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14.06" />
				</div>

				<!-- Aufgabe 15 -->
				<div id="aufgabe15" style="top: 45em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe15.png" />
					<input style="top: 3em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" name="15.01" />
					<input style="top: 7.7em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                 %" name="15.02" />
					<input style="top: 12em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                 m" name="15.03" />
					<input style="top: 16.1em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                 km" name="15.04" />
					<input style="top: 20em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                Min." name="15.05" />
				</div>

				<!-- Aufgabe 16 -->
				<div id="aufgabe16" style="top: 70em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe16.png" />
					<input style="top: 7.7em; left: 35.9em; max-width: 15em; width: 10.9em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                       Sch&uuml;ler" name="16.01" />
				</div>

				<!-- Aufgabe 17 Info-->
				<div id="aufgabe17" style="top: 85em;" class="aufgaben">
					<img style="width: 64%;" src="..\Bilder\aufgabe17_1.png" />
				</div>
				
				<!-- Aufgabe 17 Eingabefelder -->
				<div style="top: 115em; right: 0.5em;"class="aufgaben">
					<img style="width: 95%;" src="..\Bilder\aufgabe17_2.png" />
					<input style="top: 9em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.01" />
					<input style="top: 12em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.02" />
					<input style="top: 15.5em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.03" />
					<input style="top: 19em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.04" />
					<input style="top: 22.5em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.05" />
					<input style="top: 26.5em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.06" />
					<input style="top: 30em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17.07" />
				</div>

				<!-- Aufgabe 18 -->
				<div id="aufgabe18" style="top: 146em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe18.png" />
					<input style="top: 18.6em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.01" />
					<input style="top: 21.7em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.02" />
					<input style="top: 24.95em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.03" />
					<input style="top: 28.9em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.04" />
					<input style="top: 32.7em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.05" />
					<input style="top: 36.5em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18.06" />
				</div>

				<!-- Aufgabe 19 -->
				<div id="aufgabe19" style="top: 182em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe19.png" />
					<input style="top: 13.75em; left: 40.9em; min-height: 2em; max-width: 10em; width: 8.35em;" class="inputform registrierdesign" autocomplete="off" type="text"  placeholder="            ,      Mill." name="19.01" />
					<input style="top: 16.55em; left: 40.9em; min-height: 2em; max-width: 10em; width: 8.35em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="            ,      Mill." name="19.02" />
					<input style="top: 19.45em; left: 40.9em; min-height: 2em; max-width: 10em; width: 8.35em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="            ,         %" name="19.03" />
				</div>

				<!-- Aufgabe 20 Info -->
				<div id="aufgabe20" style="top: 205em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe20_1.png" />
				</div>

				<!-- Aufgabe 20 Eingabefelder -->
				<div style="top: 250em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe20_2.png" />
					<input style="top: 1.75em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.01" />
					<input style="top: 4.06em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.02" />
					<input style="top: 6.35em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.03" />
					<input style="top: 8.7em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.04" />
					<input style="top: 11em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.05" />
					<input style="top: 13.4em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.06" />
					<input style="top: 15.7em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.07" />
					<input style="top: 17.98em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.08" />
					<input style="top: 20.30em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.09" />
					<input style="top: 22.6em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.1" />
					<input style="top: 24.95em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.11" />
					<input style="top: 27.3em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20.12" />
				</div>

				<!-- Aufgabe 21 -->
				<div id="aufgabe21" style="top: 280em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe21.png" />
					<input style="top: 30.25em; left: 42em; min-height: 1.9em; max-width: 8em; width: 8em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="          ,       Euro" name="21.01" />
				</div>

				<!-- Aufgabe 22 Aufgabestellung -->
				<div style="top: 314.2em; left: 30em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe22_1.png" />
				</div>

				<!-- Aufgabe 22 Bild-->
				<div style="top: 310em;" class="aufgaben" id="aufgabe22">
					<img style="width: 100%;" src="..\Bilder\aufgabe22_2.png"  />
				</div>

				<!-- Aufgabe 22 Eingabefelder -->
				<div style="top: 345.8em;" class="aufgaben" >
					<img style="width: 100%;" src="..\Bilder\aufgabe22_3.png" />
					<input style="top: 6.50em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22.01" />
					<input style="top: 10.25em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22.02" />
					<input style="top: 14.40em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22.03" />
					<input style="top: 17.70em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22.04" />
					<input style="top: 21.25em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22.05" />
				</div>
			</div>

			<!-- Teilbereich 3 -->
			<div style="position: absolute; top: 910em; width: 100%;" >
				<h1 style="font-size: 2.4vw; background-color: #ffff00;">Teil III (sprachlicher Bereich)</h1>

				<!-- Aufgabe 23 Aufgabestellung -->
				<div id="aufgabe23" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe23_1.png" />
				</div>

				<!-- Bild für Zeitverlauf -->
				<div style="top: 26em; left: 24em;" class="aufgaben">
					<img style="100%;" src="..\Bilder\zeitverlauf.png" />
				</div>

				<!-- Aufgabe 23 Aufgabefeld 1-->
				<div style="top: 42em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe23_2.png" />
					<!-- Teil A -->
					<input style="background-color: #fbd4b4; top: 11.5em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.01" />
					<input style="background-color: #fbd4b4; top: 13.9em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.02" />
					<input style="background-color: #fbd4b4; top: 16.2em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.03" />
					<input style="background-color: #fbd4b4; top: 18.45em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.04" />
					<input style="background-color: #fbd4b4; top: 20.8em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.05" />
					<input style="background-color: #fbd4b4; top: 23.1em; left: 47.5em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.06" />
					<!-- Teil B -->
					<input style="background-color: #fbd4b4; top: 11.5em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.38" />
					<input style="background-color: #fbd4b4; top: 13.9em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.39" />
					<input style="background-color: #fbd4b4; top: 16.2em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.4" />
					<input style="background-color: #fbd4b4; top: 18.45em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.41" />
					<input style="background-color: #fbd4b4; top: 20.8em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.42" />
					<input style="background-color: #fbd4b4; top: 23.1em; left: 50em; min-height: 1.9em; width: 1.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.43" />
				</div>

				<!-- Aufgabe 23 Aufgabefeld 2 -->
				<div style="top: 60.6em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe23_3.png" />
					<!-- Teil A -->
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 0.025em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.07" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 2.3em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.08" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 4.625em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.09" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 6.925em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.1" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 9.275em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.11" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 11.6em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.12" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 13.9em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.13" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 16.15em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.14" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 18.55em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.15" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 20.825em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.16" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 23.1em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.17" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 25.45em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.18" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 27.8em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.19" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 30.1em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.2" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 32.45em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.21" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 34.8em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.22" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 37.1em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.23" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 39.4em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.24" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 41.65em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.25" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 44.05em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.26" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 46.35em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.27" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 48.65em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.28" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 51em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.29" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 53.3em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.3" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 55.6em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.31" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 57.95em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.32" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 60.2em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.33" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 62.5em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.34" />
					<!-- Teil B -->
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 0.025em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.44" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 2.3em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.45" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 4.625em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.46" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 6.925em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.47" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 9.275em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.48" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 11.6em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.49" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 13.9em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.5" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 16.15em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.51" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 18.55em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.52" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 20.825em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.53" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 23.1em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.54" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 25.45em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.55" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 27.8em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.56" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 30.1em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.57" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 32.45em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.58" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 34.8em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.59" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 37.1em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.6" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 39.4em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.61" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 41.65em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.62" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 44.05em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.63" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 46.35em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.64" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 48.65em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.65" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 51em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.66" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 53.3em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.67" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 55.6em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.68" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 57.95em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.69" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 60.2em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.7" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 62.5em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.71" />
				</div>

				<!-- Aufgabe 23 Aufgabefeld 3 -->
				<div style="top: 108em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe23_4.png" />
					<!-- Teil A -->
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 0em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.35" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 2.3em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.36" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 4.6em; left: 47.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.37" />
					<!-- Teil B -->
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 0em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.72" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 2.3em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.73" />
					<input style="background-color: #fbd4b4; min-height: 1.9em; width: 1.6em; top: 4.6em; left: 50em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23.74" />
				</div>

				<!--Aufgabe 24 Info -->
				<div id="aufgabe24" style="top: 125em;" class="aufgaben">
					<img style="width: 100%" src="..\Bilder\aufgabe24_1.png" />
				</div>

				<!-- Aufgabe 24 Eingabefelder -->
				<div style="top: 135em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe24_2.png" />
					<input style="background-color: #ffff66; top: 4.6em; left: 42.6em; min-height: 2.3em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.01" />
					<input style="top: 7.55em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.02" />
					<input style="background-color: #ffff66; top: 10.5em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.03" />
					<input style="top: 13.4em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.04" />
					<input style="background-color: #ffff66; top: 16.3em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.05" />
					<input style="top: 19.3em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.06" />
					<input style="background-color: #ffff66; top: 22.2em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.07" />
					<input style="top: 25.10em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.08" />
					<input style="background-color: #ffff66; top: 28em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.09" />
					<input style="top: 31em; left: 42.6em; min-height: 2.3em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.1" />
					<input style="background-color: #ffff66; top: 33.95em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.11" />
					<input style="top: 36.9em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.12" />
					<input style="background-color: #ffff66; top: 39.8em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.13" />
					<input style="top: 42.8em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.14" />
					<input style="background-color: #ffff66; top: 45.7em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.15" />
					<input style="top: 48.65em; left: 42.6em; min-height: 2.2em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24.16" />
				</div>

				<!-- Aufgabe 25 -->
				<div id="aufgabe25" style="top: 180em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\aufgabe25_1.png" />
				</div>

				<div style="top: 195em;" class="aufgaben">
					<textarea style="width: 100%;" cols="100" rows="30" name="25.01"></textarea>
				</div>
				<div style="top: 185em;" class="aufgaben">
						<input id="abschluss" class="btn_effects abgang" autocomplete="off" type="submit" value="Einstellungstest abschlie&szlig;en"/>
				</div>
				</form>

				<!-- Geschafft Bild -->
				<div style="top: 230em;" class="aufgaben">
					<img style="width: 100%;" src="..\Bilder\geschafft.png" />
				</div>
			</div>
		</div>
		<script>
			function wait()
			{
				document.getElementById("loadmod").style.filter="blur(2px)";
				document.getElementById("bodies").style.maxWidth="100%";
				document.getElementById("bodies").style.width="100%";
			
				var abfrage = confirm("Auf OK wird der Test abgesendet. Sind Sie sich sicher?");

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
				}			
			}
				document.getElementById("abschluss").addEventListener("click", function (event) {
					var abfrage = confirm("Auf OK wird der Test abgesendet. Sind Sie sich sicher?");
					if (abfrage == false) {
						event.preventDefault();
					}    
				});

				var hidden = false;
				document.getElementById('aufgabe12').style.visibility = 'hidden';
				function block() {
				hidden = !hidden;
				if (hidden) {
				   document.getElementById('aufgabe12a').style.visibility = 'hidden';
				}
				if(hidden) {
					 document.getElementById('aufgabe12').style.visibility = 'visible';
				 }
				}
}
		</script>
	</body>
</html>