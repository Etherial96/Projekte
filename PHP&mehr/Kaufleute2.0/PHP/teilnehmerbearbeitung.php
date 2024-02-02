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
?>
<!DOCTYPE html>
<html lang="de"> 
<head>
	<title>Auswertung</title>
	<!--<link rel="stylesheet" href="">  CSS here -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">
	dd { display:none; }

	.closed { background:white; }

	.open { background:green; }
</style>

</head>
<body style="font-size: 2vw;">
<h2 style="text-align:center;">Auswertung</h2>

<?php
	include_once ("bh/einstellungstest_db.php");
	//$highid = $_SESSION["id"];
	if(isset($_GET["idToLoad"]))
	{
		$highid = $_GET["idToLoad"];
	}

//Abruf der Teilnehmerdaten
function checkruf($p, $id, $daten)
{			
	global $dbh;

	$stmt7 = $dbh->prepare('Select name, vorname, geburtsdatum, strasse, wohnort, erzielte_punkte from teilnehmerdaten where teilnehmerid = :id');
	$stmt7->bindParam(':id', $id);
	$stmt7->execute();
	$werte = $stmt7->fetchColumn($p);
					
	echo('<p style="font-size: 0.7em;">'.$daten.''.$werte.'<p>');
}
function teilbereich($p, $id, $daten)
{
	global $dbh;

	if($p == 0)
	{
		$k = 1;
		$c = 13;
		$stmt7 = $dbh->prepare('Select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = :id and aufgaben_id >= 1
								and aufgaben_id < 13');
		$stmt7->bindParam(':id', $id);
		$stmt7->execute();
		$werte = $stmt7->fetchColumn(0);

		$stmt9 = $dbh->prepare('select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id >= 1 and aufgaben_id < 13');
		$stmt9->bindParam(':id', $id);
		$stmt9->execute();
		$fullpoints = $stmt9->fetchColumn(0) -7;

		
		echo('<p style="font-size: 0.7em;">'.$daten.''.$werte.' / '.$fullpoints.'<p>');
	}
	if($p == 1)
	{

		$stmt7 = $dbh->prepare('Select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = :id and aufgaben_id >= 13
								and aufgaben_id < 23');
		$stmt7->bindParam(':id', $id);
		$stmt7->execute();

		$stmt9 = $dbh->prepare('select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id >= 13 and aufgaben_id < 23');
		$stmt9->bindParam(':id', $id);
		$stmt9->execute();
		$fullpoints = $stmt9->fetchColumn(0);

		$werte = $stmt7->fetchColumn(0);
		echo('<p style="font-size: 0.7em;">'.$daten.''.$werte.' / '.$fullpoints.'<p>');
	}
	if($p == 2)
	{
		$stmt9 = $dbh->prepare('select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id >= 23 and aufgaben_id < 25');
		$stmt9->bindParam(':id', $id);
		$stmt9->execute();
		$fullpoints = $stmt9->fetchColumn(0);
		$fullpoints = $fullpoints + 30;

		$stmt22 = $dbh->prepare('Select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = :id and aufgaben_id > 22');
		$stmt22->bindParam(':id', $id);
		$stmt22->execute();
		$first = $stmt22->fetchColumn(0);

		$stmt22 = $dbh->prepare('select sum(bewertung) from aufgabe25 where teilnehmerid = :id and aufgaben_id = 25');
		$stmt22->bindParam(':id', $id);
		$stmt22->execute();
		$last = $stmt22->fetchColumn(0);

		$first += $last;
		echo('<p style="font-size: 0.7em;">'.$daten.''.$first.' / '.$fullpoints.'<p>');
	}

}

$grunddaten = array(0 => "Nachname: ", 1 => "Vorname: ", 2 => "Geburtsdatum: ", 3 => "Stra&szlig;e: ", 4 => "Wohnort: ", 5 => "Ges.Punkte: ");
$teilbereiche = array(0 => "Teilbereich 1: ", 1 => "Teilbereich 2: ", 2 => "Teilbereich 3: ");
echo('<div style="line-height:0%; position: absolute; top: 0.5em; left: 40em;">');
//Grunddaten des Bewerbers anzeigen.
for($i = 0; $i < 6; $i++)
{		
	checkruf($i, $highid, $grunddaten[$i]);
}
//Punktanzahl der einzelnen Teilbereiche der Aufgaben zusammengerechnet und anzeigen.
echo('</br>');
for($i = 0; $i < 3; $i++)
{		
	teilbereich($i, $highid, $teilbereiche[$i]);
}
echo('</div>');

	$stmt6 = $dbh->prepare('Select * from teilnehmerergebnisse where teilnehmerid = 0');
	$stmt6->bindParam(':id', $id);
	$stmt6->execute();
	$werte = $stmt6->fetchColumn($p);
	
	//Groesse ermitteln, damit man wei� wie viele Zeilen erzeugt werden sollen in der Tabelle.
	function strukttabellen($aufgabenid, $idst)
	{
		global $dbh;

		
		//Namen der Bundesländer anzeigen, damit es ersichtlicher ist in der bearbeitung
		$bundeslaender = array(0 => "Saarland ", 1 => "Rheinland Pfalz ", 2 => "Nordrhein-Westfalen", 3 => "Baden-Württemberg"
			, 4 => "Bayern", 5 => "Hessen", 6 => "Thüringen", 7 => "Sachsen-Anhalt", 8 => "Sachsen" 
			, 9 => "Brandenburg", 10 => "Berlin", 11 => "Niedersachsen", 12 => "Bremen", 13 => "Hamburg" 
			, 14 => "Schleswig-Holstein", 15 => "Mecklenburg-Vorpommern");

		//Musterlösung Zählen wie viele Antworten es bei dieser Aufgabe gibt
		$stmt1 = $dbh->prepare('select count(aufgaben_id) from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id = :aufgabenid');
		$stmt1->bindParam(':aufgabenid', $aufgabenid);
		$stmt1->execute();
		$end = $stmt1->fetchColumn(0);
		//Musterlösung je Aufgabe die Gesamtpunktzahl berechnen
		$stmt2 = $dbh->prepare('select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id = :aufgabenid');
		$stmt2->bindParam(':aufgabenid', $aufgabenid);
		$stmt2->execute();
		$maxpoint = $stmt2->fetchColumn(0);
		//Teilnehmer je Aufgabe die Gesamtpunktzahl berechnen
		$stmt3 = $dbh->prepare('select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = :idst and aufgaben_id = :aufgabenid');
		$stmt3->bindParam(':idst', $idst);
		$stmt3->bindParam(':aufgabenid', $aufgabenid);
		$stmt3->execute();
		$teilpoint = $stmt3->fetchColumn(0);

		//Musterlösung
		$stmt4 = $dbh->prepare('select aufgabenposid, teilnehmerantwort, bewertung from teilnehmerergebnisse where teilnehmerid = 0 
								and aufgaben_id = :aufgabenid
								ORDER BY aufgaben_id,aufgabenposid ASC');
		$stmt4->bindParam(':aufgabenid', $aufgabenid);
		$stmt4->execute();
		$result = $stmt4->fetchAll();
	
		//Teilnehmerlösung
		$stmt5 = $dbh->prepare('select aufgabenposid, teilnehmerantwort, bewertung from teilnehmerergebnisse where teilnehmerid = :idst
								and aufgaben_id = :aufgabenid
								ORDER BY aufgaben_id,aufgabenposid ASC');
		$stmt5->bindParam(':idst', $idst);
		$stmt5->bindParam(':aufgabenid', $aufgabenid);
		$stmt5->execute();
		$kandidat = $stmt5->fetchAll();
		//Musterlösung
		echo('<table style="position:absolute; left: 9em; top: 2em;">');
		for($i = 0; $i < $end; $i++)
		{
			if($i == 0)
			{
				echo('<th>Feld</th>');
				echo('<th>L&ouml;sung</th>');
				echo('<th>Punktzahl</th>');

			}
			if($aufgabenid == 23 && $i == 0)
			{	
				echo('<tr><th style="font-size: 0.7em;">Rechtschreibung</th></tr>');
			}
			else if($aufgabenid == 23 && $i == 37)
			{
				echo('<tr><th style="font-size: 0.7em;">Kommasetzung</th></tr>');
			}
			
			echo('<tr>');
			
			for($k = 0; $k < 3; $k++)
			{	
				if($k == 1 && $aufgabenid == 8)
				{
					echo('<td style="border: 0.1em solid black; line-height:0%; text-align: center;"><p style="line-height:100%; font-size: 0.7em;">'.$result[$i][$k].'</br>'.$bundeslaender[$i].'</p></td>');
				}
				else
				{
					echo('<td style="border: 0.1em solid black; line-height:0%; text-align: center;"><p style="line-height:100%; font-size: 0.7em;">'.$result[$i][$k].'</p></td>');
				}
			}
			echo('</tr>');
		}
		echo('<th>Ges.Punkte:'.$maxpoint.'</th>');
		echo('</table>');

		//Teilnehmer
		echo('<table style="position:absolute; left: 28em; top: 2em;">');

		for($i = 0; $i < $end; $i++)
		{	
			$fields += 0.01;
			$namefield = (string)$fields + $aufgabenid;
			
			if($i == 0)
			{
				echo('<th>Feld</th>');
				echo('<th>Antwort</th>');
				echo('<th>Bewertung</th>');
			}
			if($aufgabenid == 23 && $i == 0)
			{	
				echo('<tr><th style="font-size: 0.7em;">Rechtschreibung</th></tr>');
			}
			else if($aufgabenid == 23 && $i == 37)
			{
				echo('<tr><th style="font-size: 0.7em;">Kommasetzung</th></tr>');
			}
			echo('<tr>');
			
			for($k = 0; $k < 3; $k++)
			{
				echo('<td style="border: 0.1em solid black; line-height:0%; text-align: center;"><p style="line-height:100%; font-size: 0.7em;">'.$kandidat[$i][$k].'</p></td>');
			}
			if($aufgabenid == 8)
			{	
				$namefield = $fields + 27;
				echo('<td><input style="top: 48.65em; left: 42.6em; min-height: 3.2em; width: 4.3em; max-width: 5em; font-size: 0.6em;" class="inputform registrierdesign" type="text" name="'.rtrim($namefield, 0).'" /></td>');
			}
			else if($aufgabenid == 12.1)
			{
				$namefield = $fields + 28;
				echo('<td><input style="top: 48.65em; left: 42.6em; min-height: 3.2em; width: 4.3em; max-width: 5em; font-size: 0.6em;" class="inputform registrierdesign" type="text" name="'.rtrim($namefield, 0).'" /></td>');
			}
			else
			{
				echo('<td><input style="top: 48.65em; left: 42.6em; min-height: 3.2em; width: 4.3em; max-width: 5em; font-size: 0.6em;" class="inputform registrierdesign" type="text" name="'.rtrim($namefield, 0).'" /></td>');
			}
			echo('</tr>');
		}
		$fields = 0;
		echo('<th>Ges.Punkte:'.$teilpoint.'</th>');
		echo('</table>');
	}
	//Erstellen der Struktur und durch strukttabellen wird sie ausgefüllt
	function getaufgabengroesse($aid)
	{
		global $dbh;
	
		for($aufgaben = 1; $aufgaben < 26; $aufgaben++)
		{ 			
			if($aufgaben == 25)
			{	
				echo('<dt>Aufgabe <a class="closed">'.$aufgaben.'</a></dt>');
				echo('<dd>');
				$stmt8 = $dbh->prepare('select teilnehmerantwort from aufgabe25 where teilnehmerid = :aid');
				$stmt8->bindParam(':aid', $aid);
				$stmt8->execute();
				$text = $stmt8->fetchColumn(0);

				$stmt17 = $dbh->prepare('select korrektur from aufgabe25 where teilnehmerid = :aid');
				$stmt17->bindParam(':aid', $aid);
				$stmt17->execute();
				$korrektur = $stmt17->fetchColumn(0);

				$stmt15 = $dbh->prepare('select bewertung from aufgabe25 where teilnehmerid = :aid');
				$stmt15->bindParam(':aid', $aid);
				$stmt15->execute();
				$points = $stmt15->fetchColumn(0);



				echo('<textarea style="position: absolute; top: 7em; left: 10em; font-size: 0.7em;" cols="65" rows="50">'.$text.'</textarea>');
				echo('<h4 style="position: absolute; font-size: 0.7em; top: 4em; left: 54em;">Korrektur</h4>');
				echo('<textarea name="25.02" style="position: absolute; top: 7em; left: 51em; font-size: 0.7em;" cols="30" rows="50">'.$korrektur.'</textarea>');
				echo('<td><input style="position: absolute; top: 25em; left: 88em; min-height: 3.2em; width: 4.3em; max-width: 5em; font-size: 0.6em;" class="inputform registrierdesign" type="text" name="25.01" /></td>');
				echo('<h5 style="position: absolute; top: 45em; left: 9em; font-size: 1em;">Ges.Punkte:30</h5>');
				echo('<h5 style="position: absolute; top: 45em; left: 40em; font-size: 1em;">Erz.Punkte:'.$points.'</h5>');
				echo('</dd>');
			}
			if($aufgaben < 25)
			{
				echo('<dt>Aufgabe <a class="closed">'.$aufgaben.'</a></dt>');
				echo('<dd>');
				strukttabellen($aufgaben, $aid);
				echo('</dd>');
			}		
			
			if($aufgaben == 8)
			{	
				$aufgaben = 8.1;
				echo('<dt>Aufgabe <a class="closed">8b</a></dt>');
				echo('<dd>');
				strukttabellen($aufgaben, $aid);
				echo('</dd>');
				$aufgaben = 8;
			}	
			if($aufgaben == 11)
			{
				$aufgaben = 12.1;
				echo('<dt>Aufgabe <a class="closed">12a</a></dt>');
				echo('<dd>');
				strukttabellen($aufgaben, $aid);
				echo('</dd>');
				$aufgaben = 11;
			}
			
		}
	}
	echo('<div style="font-size: 1.5vw; position: absolute; right: 58.5em; top: 3em;">');
	echo('<form action="" method="post">');
	echo('<dl>');
	getaufgabengroesse($highid);
	echo('</dl>');
	echo('<input type="submit" name="eintrag" value="Ergebnisse eintragen" style="font-size: 0.7em; position: absolute; top: 34em; left: 76em;"/>');
	echo('</form>');
	echo('</div>');

	function aufgabeniderfassung($begin, $bigpoints, $setid, $teilnehmerid)
	{
		global $dbh;
		$aufgabenposid = 0;
		$emptycheck;
		$changetabelle = 'teilnehmerergebnisse';

		if($setid == 25)
		{
			$changetabelle = 'aufgabe25';
		}
		while(round($begin, 2) <= round($bigpoints,2))
		{
			$nutzereingabe = $_POST[str_replace('.','_',$begin)];
			$nutzereingabe = str_replace(',','.',$nutzereingabe);
			//$nutzereingabe = str_replace('','',$nutzereingabe);
		
			//number_format($nutzereingabe, 2);
			if(empty($nutzereingabe) != empty($emptycheck))
			{
				$stmt10 = $dbh->prepare('Update '.$changetabelle.' set bewertung = :nutzereingabe where teilnehmerid = :teilnehmerid
									and aufgabenposid = :aufgabenposid and aufgaben_id = :setid');
				$stmt10->bindParam(':nutzereingabe', $nutzereingabe);
				$stmt10->bindParam(':teilnehmerid', $teilnehmerid);
				$stmt10->bindParam(':setid', $setid);
				$stmt10->bindParam(':aufgabenposid', $aufgabenposid);					
				$stmt10->execute();	
			}
			if(empty($nutzereingabe) != empty($emptycheck))
			{
				$stmt10 = $dbh->prepare('Update '.$changetabelle.' set bewertung = :nutzereingabe where teilnehmerid = :teilnehmerid
									and aufgabenposid = :aufgabenposid and aufgaben_id = :setid');
				$stmt10->bindParam(':nutzereingabe', $nutzereingabe);
				$stmt10->bindParam(':teilnehmerid', $teilnehmerid);
				$stmt10->bindParam(':setid', $setid);
				$stmt10->bindParam(':aufgabenposid', $aufgabenposid);					
				$stmt10->execute();	
			}
			//Die Korrektur zu Aufgabe 25 anzeigen
			if(empty($nutzereingabe) != empty($emptycheck) && ($setid == 25))
			{
				$stmt10 = $dbh->prepare('Update aufgabe25 set korrektur = :nutzereingabe where teilnehmerid = :teilnehmerid
									and aufgabenposid = 0 and aufgaben_id = :setid');
				$stmt10->bindParam(':nutzereingabe', $nutzereingabe);
				$stmt10->bindParam(':teilnehmerid', $teilnehmerid);
				$stmt10->bindParam(':setid', $setid);				
				$stmt10->execute();	
			}

			$aufgabenposid++;
			$begin = doubleVal($begin + (double)0.01);
			
			//echo(''.$nutzereingabe.' aktuellerStand ='.$begin.' teilnehmerid ='.$highid.' setid='.$setid.' schleifenende='.$bigpoints.'');		
		}
	}

	$aufgabenanfang = 1.01;
	$start = 1.01;
	$aufgabengroesse;
	$getid;
	$highestid = $_GET["idToLoad"];
	$datum = date("Y.m.d H:i:s");

	$antwortenproid = array(0 => "1", 1 => "6", 2 => "18", 3 => "8", 4 => "9", 5 => "8", 6 => "5", 7 => "16", 8 => "5" 
			, 9 => "14", 10 => "15", 11 => "20", 12 => "1", 13 => "6", 14 => "5", 15 => "1", 16 => "7", 17 => "6", 18 => "3"
			, 19 => "12", 20 => "1", 21 => "5", 22 => "74", 23 => "16", 24 => "10");

	$antwortenproidpoints = array(0 => "0.01", 1 => "0.06", 2 => "0.18", 3 => "0.08", 4 => "0.09", 5 => "0.08", 6 => "0.05", 7 => "0.16", 8 => "0.05" 
			, 9 => "0.14", 10 => "0.15", 11 => "0.20", 12 => "0.01", 13 => "0.06" , 14 => "0.05", 15 => "0.01", 16 => "0.07", 17 => "0.06", 18 => "0.03"
			, 19 => "0.12", 20 => "0.01", 21 => "0.05", 22 => "0.74", 23 => "0.16", 24 => "0.10");
	//8.1 hat die name id = 27.01 und 16 antworten
	//datenbank id 1 = erste aufgabe, programmierung id 0 = aufgabe 1       brauche 26er array weil 26 aufgaben.
	for($id = 0; $id < 24; $id++)
	{	
		$getid = 1 + $id;

		$aufgabenanfang = ($start + $id);
		$aufgabengroesse = (1 + $id) + $antwortenproidpoints[$id]; //= 1.01 oder 2.06

		aufgabeniderfassung($aufgabenanfang, $aufgabengroesse, $getid, $highestid);	

		$aufgabengroesse = 0;

		if($id == 23)
		{
			$getid = 8.1;
			$aufgabenanfang = 27.01;
			$aufgabengroesse = 27.16;

			aufgabeniderfassung($aufgabenanfang, $aufgabengroesse, $getid, $highestid);
			
			$getid = 12.1;
			$aufgabenanfang = 28.01;
			$aufgabengroesse = 28.14;

			aufgabeniderfassung($aufgabenanfang, $aufgabengroesse, $getid, $highestid);
		
			$getid = 25;
			$aufgabenanfang = 25.01;
			$aufgabengroesse = 25.02;

			aufgabeniderfassung($aufgabenanfang, $aufgabengroesse, $getid, $highestid);

			//Punkte berechnen und Eintrag in die Datenbank
			$stmt13 = $dbh->prepare('select sum(bewertung) from aufgabe25 where teilnehmerid = :highestid');
			$stmt13->bindParam(':highestid', $highestid);
			$stmt13->execute();
			$zwergebnis = $stmt13->fetchColumn(0);

			$stmt77 = $dbh->prepare('Select sum(bewertung) from teilnehmerergebnisse where teilnehmerid = :highestid');
			$stmt77->bindParam(':highestid', $highestid);
			$stmt77->execute();
			$zw2ergebnis = $stmt77->fetchColumn(0);
			
			$endergebnis = $zwergebnis + $zw2ergebnis;

			$stmt13 = $dbh->prepare('Update teilnehmerdaten set erzielte_punkte =:endergebnis where teilnehmerid = :highestid');
			$stmt13->bindParam(':endergebnis', $endergebnis);
			$stmt13->bindParam(':highestid', $highestid);
			$stmt13->execute();
		}
	}
	if($_POST['eintrag'] == 'Ergebnisse eintragen')
	{
		echo('<META HTTP-EQUIV=Refresh CONTENT="0">');
	}			

?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("dt").click(function(){ 
		$('dd').slideUp();
		$('dt > a').removeClass('open').addClass("closed");
		$(this).next("dd").slideDown(); 
		$(this).children("a").removeClass('closed').addClass("open");
	});
});
	</script>
</body>
</html>
