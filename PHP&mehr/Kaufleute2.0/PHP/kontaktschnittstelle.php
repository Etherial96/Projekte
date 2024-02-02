<?php
	session_start();
	//error_reporting(E_ALL); ini_set("display_errors", 1);
	//include_once ("datenbankverbindung.php");
	//include_once ("../inc/allg_func.php");
	$_SESSION["fehler"] = 0; 
	$nachname = $_POST['nachname'];
	$vorname = $_POST['vorname'];
	$qualifikation = $_POST['qualifikation'];
	$geburtsdatum = $_POST['geburtsdatum'];
	$street = $_POST['street'];
	$plz = $_POST['plz'];

	$datum = date("Y.m.d H:i:s");
	$uhrzeit = date("H:i");
	$emptycheck;
	$stp = $dbh->prepare("select * from orte where plz ='$plz'");
	$stp->execute();
	$resultortsid = $stp->fetchColumn(1);

	if(empty($resultortsid) !== empty($emptycheck) && empty($street) !== empty($emptycheck) && $_POST['dsgvo'] == true
		&& empty($nachname) !== empty($emptycheck) && empty($vorname) !== empty($emptycheck) && empty($geburtsdatum) !== empty($emptycheck) && empty($qualifikation) !== empty($emptycheck))
	{	
		session_regenerate_id();
		$sessionid = session_id();
		$_SESSION["sessionid"] = $sessionid;
		$dsgvo = "erlaubt";
		$stmt2 = $dbh->prepare('INSERT INTO teilnehmerdaten (fachbereichid, name, vorname, bildungsabschluss, geburtsdatum, strasse, wohnort, startzeit, datenschutz, sessionid) 
								VALUES (2 ,:nachname, :vorname, :qualifikation, :geburtsdatum, :street, :resultortsid, :datum, :dsgvo, :sessionid) ');
		$stmt2->bindParam(':nachname', $nachname);
		$stmt2->bindParam(':vorname', $vorname);
		$stmt2->bindParam(':qualifikation', $qualifikation);
		$stmt2->bindParam(':geburtsdatum', $geburtsdatum);
		$stmt2->bindParam(':street', $street);
		$stmt2->bindParam(':resultortsid', $resultortsid);
		$stmt2->bindParam(':datum', $datum);
		$stmt2->bindParam(':dsgvo', $dsgvo);
		$stmt2->bindParam(':sessionid', $sessionid);
		$stmt2->execute();
		
		$stmt3 = $dbh->prepare('Select teilnehmerid from teilnehmerdaten where sessionid = :sessionid');
		$stmt3->bindParam(':sessionid', $sessionid);
		$stmt3->execute();
		
		$_SESSION["teilnehmerid"] = $stmt3->fetchColumn(0);
		$highestid = $_SESSION["teilnehmerid"];

		$_SESSION["bereich"] = 3;
		unset ($_SESSION['vorname']);
		unset ($_SESSION['nachname']);
		unset ($_SESSION['street']);
		unset ($_SESSION['plz']);
		unset ($_SESSION['geburtsdate']);
		unset ($_SESSION['quali']);
		unset ($_SESSION['dsgvo']);
		//errorlist
		unset ($_SESSION['dsgvoerror']);
		unset ($_SESSION['ortserror']);
		unset ($_SESSION['nachnameerror']);
		unset ($_SESSION['vornameerror']);
		unset ($_SESSION['streeterror']);
		//Der Nutzer wird mit allen Aufgaben in der Datenbank angelegt.
		aufgabeninitial($highestid, $sessionid);

		header('Location: '.$ziel.'Einstellungstestaufruf.php');		
	}
	else
	{	
		$_SESSION["quali"] = $qualifikation;
		$_SESSION["geburtsdate"] = $geburtsdatum;
		$_SESSION["nachname"] = $nachname;
		$_SESSION["vorname"] = $vorname;
		$_SESSION["street"] = $street;
		$_SESSION["plz"] = $plz;
		

		if($resultortsid != empty($emptycheck))
		{
			$_SESSION["ortserror"] = 1;
		}
		else
		{
			$_SESSION["ortserror"] = 0;
		}
		if($_POST['dsgvo'] != true)
		{
			$_SESSION["dsgvoerror"] = 1;
			$_SESSION["dsgvo"] = 'unchecked';
		}
		else
		{
			$_SESSION["dsgvoerror"] = 0;
			$_SESSION["dsgvo"] = 'checked';
		}
		if(empty($nachname) == empty($emptycheck))
		{
			$_SESSION["nachnameerror"] = 1;
		}
		else
		{
			$_SESSION["nachnameerror"] = 0;
		}
		if(empty($vorname) == empty($emptycheck))
		{
			$_SESSION["vornameerror"] = 1;
		}
		else
		{
			$_SESSION["vornameerror"] = 0;
		}
		if(empty($street) == empty($emptycheck))
		{
			$_SESSION["streeterror"] = 1;
		}
		else
		{
			$_SESSION["streeterror"] = 0;
		}
		if(empty($geburtsdatum) == empty($emptycheck))
		{
			$_SESSION["geburtsdate"] = 1;
		}
		else
		{
			$_SESSION["geburtsdate"] = 0;
		}
		
		header('Location: '.$ziel.'teilnehmerformular.php');
	}

function aufgabeninitial($highid, $sessiont)
{
	global $dbh;
	$aufgabenposid = 0;
	$i = 0;

	$antwortenproid = array('1', '6', '18', '8', '9', '8', '5', '16', '5', '14', '15', '20'
	, '1', '6', '5', '1', '7', '6', '3', '12', '1', '5', '74', '16', '1', '16', '14');

	for($lauf = 0; $lauf < 27; $lauf++)
	{
		$aufgabe = $lauf + 1;
		if($aufgabe == 26)
		{
			$aufgabe = 8.1;
		}
		if($aufgabe == 27)
		{
			$aufgabe = 12.1;
		}
		while($i < $antwortenproid[$lauf])
		{
			$nutzereingabe = '';
			/*if($setid != 25)
			{
				$nutzereingabe = str_replace(',','.',$nutzereingabe);
			}*/
			if($aufgabe == 25)
			{
				$stmt2 = $dbh->prepare('INSERT INTO aufgabe25(teilnehmerid, fachbereichid, aufgaben_id, aufgabenposid, teilnehmerantwort, sessionid) 
				VALUES(:highid, 2, :aufgabe, :aufgabenposid, :nutzereingabe, :sessiont)');
				$stmt2->bindParam(':highid', $highid);
				$stmt2->bindParam(':aufgabe', $aufgabe);
				$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
				$stmt2->bindParam(':nutzereingabe', $nutzereingabe);
				$stmt2->bindParam(':sessiont', $sessiont);			
				$stmt2->execute();
			}
			else
			{
				$stmt2 = $dbh->prepare('INSERT INTO teilnehmerergebnisse(teilnehmerid, fachbereichid, aufgaben_id, aufgabenposid, teilnehmerantwort, sessionid) 
										VALUES(:highid, 2, :aufgabe, :aufgabenposid, :nutzereingabe, :sessiont)');
				$stmt2->bindParam(':highid', $highid);
				$stmt2->bindParam(':aufgabe', $aufgabe);
				$stmt2->bindParam(':aufgabenposid', $aufgabenposid);
				$stmt2->bindParam(':nutzereingabe', $nutzereingabe);
				$stmt2->bindParam(':sessiont', $sessiont);			
				$stmt2->execute();
			}
			$aufgabenposid++;
			$i++;
		}
		$aufgabenposid = 0;
		$i = 0;
	}
}
?>