<?php 	
session_start();
//error_reporting(E_ALL); ini_set("display_errors", 1); print_r($_POST);
include_once ("datenbankverbindung.php");
function aufgabeninitial($highid)
{
	global $dbh;
	$aufgabenposid = 0;
	$i = 0;

	$antwortenproid = array('1', '6', '18', '8', '9', '8', '5', '16', '5', '14', '15', '20'
	, '1', '6', '5', '1', '7', '6', '3', '12', '1', '5', '74', '16', '10');

	for($lauf = 1; $lauf < 25; $lauf++)
	{
		while($i < $antwortenproid[$lauf])
		{
			$nutzereingabe = 0;
			if($setid != 25)
			{
				$nutzereingabe = str_replace(',','.',$nutzereingabe);
			}

			$stmt2 = $dbh->prepare('INSERT INTO teilnehmerergebnisse(teilnehmerid, fachbereichid, aufgaben_id, aufgabenposid, teilnehmerantwort) 
									VALUES(:highid, 2, :lauf, :aufgabenposid, :nutzereingabe)');
			$stmt2->bindParam(':highid', $highid);
			$stmt2->bindParam(':lauf', $lauf);
			$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
			$stmt2->bindParam(':nutzereingabe', $nutzereingabe);				
			$stmt2->execute();
		
			$aufgabenposid++;
			$i++;
		}
		$aufgabenposid = 0;
		$i = 0;
	}
}
function aufgabeniderfassung($bigpoints, $setid, $highid, $sessionid)
{
	global $dbh;
	$aufgabenposid = 0;
	$i = 0;
	
	//$answers = preg_split("/[,]+/", $_GET["answer"]);
	$answers = preg_split("/([-][,])+/", $_GET["answer"]);
	echo('<p style="position: absolute; left: 48em;">'.$answers[3].'</p>');
	$emptycheck;
	
	while($i < $bigpoints)
	{
		//Die Aufgabe 8b ist 8.1 , Die Aufgabe 12a ist 12.1
		if($setid == 8 && $i == 16)
		{
			$setid = 8.1;
			$aufgabenposid = 0;
		}
		if($setid == 12.1 && $i == 14)
		{
			$setid = 12;
			$aufgabenposid = 0;
		}
		$nutzereingabe = $answers[$i];
		//Zahlen mit Komma sind ein string. Somit behoben
		if($setid != 25)
		{
			//echo($nutzereingabe.'   test  ');
			$nutzereingabe = str_replace('-','', $nutzereingabe);
			$nutzereingabe = str_replace(',','.', $nutzereingabe);
		}
		
		if($setid == 25)
		{
			$stmt2 = $dbh->prepare('update aufgabe25 set teilnehmerantwort = :nutzereingabe where teilnehmerid = :highid and sessionid = :sessionid 
								and aufgaben_id = :setid and aufgabenposid = :aufgabenposid');
			$stmt2->bindParam(':highid', $highid);
			$stmt2->bindParam(':setid', $setid);
			$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
			$stmt2->bindParam(':nutzereingabe', $nutzereingabe);
			$stmt2->bindParam(':sessionid', $sessionid);				
			$stmt2->execute();
		}
		else
		{
			$stmt2 = $dbh->prepare('update teilnehmerergebnisse set teilnehmerantwort = :nutzereingabe where teilnehmerid = :highid and sessionid = :sessionid 
								and aufgaben_id = :setid and aufgabenposid = :aufgabenposid ');
			$stmt2->bindParam(':highid', $highid);
			$stmt2->bindParam(':setid', $setid);
			$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
			$stmt2->bindParam(':nutzereingabe', $nutzereingabe);
			$stmt2->bindParam(':sessionid', $sessionid);				
			$stmt2->execute();
		}
		$aufgabenposid++;
		$i++;
		//echo(''.$nutzereingabe.' aktuellerStand ='.$begin.' teilnehmerid ='.$highid.' setid='.$setid.' schleifenende='.$bigpoints.'');
	}	
}

function auswertungsupdate($bewertungs, $highids, $setids, $aufgabenposids, $sessionidt)
{
	global $dbh;
	
	$stmt3 = $dbh->prepare('Update teilnehmerergebnisse set bewertung = :bewertungs where aufgaben_id = :setids
							and teilnehmerid = :highids and aufgabenposid = :aufgabenposids and sessionid = :sessionidt');
	$stmt3->bindParam(':bewertungs', $bewertungs);
	$stmt3->bindParam(':highids', $highids);
	$stmt3->bindParam(':setids', $setids);
	$stmt3->bindParam(':aufgabenposids', $aufgabenposids);
	$stmt3->bindParam(':sessionidt', $sessionidt);
	$stmt3->execute();
}
function aufgabenauswertung($bigpoints, $setid, $highid, $sessionid)
{
	global $dbh;

	$eumitglieder = array(0 => "Bulgarien", 1 => "Dänemark", 2 => "Estland", 3 => "Finnland", 4 => "Griechenland"
	, 5 => "Irland", 6 => "Kroatien", 7 => "Lettland", 8 => "Litauen", 9 => "Malta", 10 => "Österreich", 11 => "Polen", 12 => "Portugal"
	, 13 => "Rumänien", 14 => "Schweden", 15 => "Slowakei", 16 => "Slowenien", 17 => "Spanien", 18 => "Tschechien", 19 => "Ungarn", 20 => "Zypern");
	$eumitgliedcounter = 0;
	$eufirststates = array(0 => "Belgien", 1 => "Deutschland", 2 => "Frankreich", 3 => "Italien", 4 => "Luxemburg", 5 => "Niederlande");
	$eu12bcounter = 0;
	$aufgabenposid = 0;
	$emptycheck;
	$bewertung = array(0 => "1", 1 => "3", 2 => "0.5", 3 => "0");
	$h;
	$i = 0;
	$seter = $setid;
	while($i <= $bigpoints)
	{
		if($setid == 8 && $i == 16)
		{
			$setid = 8.1;
			$seter = $setid;
			$aufgabenposid = 0;
		}
		if($setid == 12.1 && $i == 14)
		{
			$setid = 12;
			$seter = $setid;
			$aufgabenposid = 0;
		}
		$stmt1 = $dbh->prepare('Select * from teilnehmerergebnisse where teilnehmerid = :highid and sessionid = :sessionid and aufgaben_id = :setid and aufgabenposid = :aufgabenposid');
		$stmt1->bindParam(':highid', $highid);
		$stmt1->bindParam(':sessionid', $sessionid);
		$stmt1->bindParam(':setid', $setid);
		$stmt1->bindParam(':aufgabenposid', $aufgabenposid);
		$stmt1->execute();
		$resultanswer = $stmt1->fetchColumn(3);

		$stmt2 = $dbh->prepare('Select * from teilnehmerergebnisse where teilnehmerid = 0 and aufgaben_id = :setid and aufgabenposid = :aufgabenposid');
		$stmt2->bindParam(':setid', $setid);
		$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
		$stmt2->execute();
		$resultsolution = $stmt2->fetchColumn(3);

		if($resultanswer != $resultsolution)
		{
			$h = 3;
			auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
		}
		//echo('Schleifenstand ='.$begin.' teilnehmerid ='.$highid.' setid='.$setid.' schleifenende='.$bigpoints."<br>");
		if($resultanswer == $resultsolution && ($setid < 8 || $setid == 9 || $setid == 10 || $setid == 11 || $setid == 14 || $setid == 17 || $setid == 18 || $setid == 20 || $setid == 22 || $setid == 24))
		{
			$h = 0;
			auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);		
		}
		else if($resultanswer == $resultsolution && ($setid == 8 || $setid == 8.1 || $setid == 11 || $setid == 23))
		{
			$h = 2;
			auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
			//echo('antwort = '.$resultanswer.' loesung'.$resultsolution.'<br>');
		}
		else if($resultanswer == $resultsolution && ($setid == 13 || $setid == 15 || $setid == 16 || $setid == 19 || $setid == 21))
		{
			$h = 1;	
			auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
		}
		else if($resultanswer != $resultsolution  && $resultanswer != 0 && ($setid == 19 || $setid == 20 || $setid = 21))
		{
			$resultanswer = str_replace(',','.',$resultanswer);
			$abweichungsberechner = doubleVal($resultsolution) / doubleVal($resultanswer);

			if(round($abweichungsberechner, 4) >= 0.9999 && round($abweichungsberechner, 5) <= 1.0000937 && ($setid == 19 || $setid == 21))
			{
				$h = 1;
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);	
			}
			else if(round($abweichungsberechner, 5) >= 0.9905 && round($abweichungsberechner, 5) <= 1.009 && ($setid == 19 || $setid == 21))
			{
				$h = 2;
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
			}
			else if(round($abweichungsberechner, 4) >= 0.9999 && round($abweichungsberechner, 5) <= 1.0000937 && ($setid == 20))
			{
				$h = 0;
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
			}
		}
		else if($resultanswer != $resultsolution  && ($setid == 10))
		{
			$counter = 0;

			for($c = 0; $c <= strlen($resultanswer)-1; $c++)
			{
				for($i = 0; $i <= strlen($resultsolution)-1; $i++)
				{
					
					if($resultanswer[$c] == $resultsolution[$i])
					{
						$counter++;
						$resultsolution[$i] = '4';
						break;
					}
				}
			}
			//Bewerten wie viel Falsch ist und nicht richtig
			if($counter > 4)
			{
				$h = 0;
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
			}
			else if($counter > 2 && $counter < 10)
			{
				$h = 2;
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
			}
		}
		else if($resultanswer == $resultsolution && ($setid == 12))
		{
			$h = 2;
			if($eu12bcounter < 6)
			{
				auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
				$eu12bcounter++;
			}
		}
		else if($setid == 12.1)
		{
			for($eu = 0; $eu < 21; $eu++)
			{
				if($resultanswer == $eumitglieder[$eu] && $eumitgliedcounter < 8)
				{
					$h = 2;
					auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
					$eumitglieder[$eu] = "ende";
					$eumitgliedcounter++;
					break;
				}
			}
			for($eust = 0; $eust < 6; $eust++)
			{
				if($resultanswer == $eufirststates[$eust])
				{
					$h = 2;
					auswertungsupdate($bewertung[$h], $highid, $setid, $aufgabenposid, $sessionid);
					$eufirststates[$eust] = "ende";
					break;
				}
			}
		}
		//Seltsamer Fehler, switcht bei falscher eingabe auf eine andere id. behebt sich in der nächsten Zeile
		$setid = $seter;	
		//echo('set '.$setid.'<br>');
		$aufgabenposid++;
		$i++;
	}
}
if(isset($_GET["answer"]))
{
	$answers = preg_split("/([-][,])+/", $_GET["answer"]);
	//$answers = preg_split("/[,]+/", $_GET["answer"]);
	$id = $_GET["aufgabenid"];
	if($id == 12)
	{
		$id = 12.1;
	}
	$idstop = $id +1;
	$aufgabengroesse = sizeof($answers);
	$emptycheck;
	$highestid = $_SESSION['teilnehmerid'];
	$session = $_SESSION["sessionid"];

	for($id; $id < $idstop; $id++)
	{
		aufgabeniderfassung($aufgabengroesse, $id, $highestid, $session);
		aufgabenauswertung($aufgabengroesse, $id, $highestid, $session);
	}
}

?>