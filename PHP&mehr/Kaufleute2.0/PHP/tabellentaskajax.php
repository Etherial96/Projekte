<?php
include_once ("datenbankverbindung.php");
if (isset($_GET["fachbereich"])) {
$jahrquery =$_GET["year"];

$fachbereich = $_GET["fachbereich"];

if($fachbereich == 'ecdate')
{
    $fachbereich = 4;
}
else if($fachbereich == 'fadate')
{
    $fachbereich = 1;
}
else if($fachbereich == 'gadate')
{
    $fachbereich = 2;
}

// Den Zeichensatz �ber header() senden,
// sonst werden Umlaute ggf. nicht richtig angezeigt.
header('Content-Type: text/plain; charset=utf-8');

echo('<table id="table"> <tr> <!-- tr= Tabellen Zeile -->
				<th>Nachname</th> <!-- th = Tabellen Header Spalte --> 
				<th>Vorname</th>
				<th>Punktanzahl</th>
				<th>Datum</th>
				<th>Wohnort</th>
				<th>Voraus. Bildungsabschluss</th>
			</tr>');
function hervorruf($id, $getergebnis, $result, $fachbereichids)
{
    $emptycheck;
    $qualifikation = $_POST['qualifikation'];
    global $dbh;
    $stmt2 = $dbh->prepare('Select name, vorname, erzielte_punkte, startzeit, wohnort, bildungsabschluss from teilnehmerdaten 
                            where extract(year from startzeit) = :year and teilnehmerid = :id and fachbereichid = :fachbereichids');
    $stmt2->bindValue(':year', $_GET["year"]);
    $stmt2->bindParam(':fachbereichids', $fachbereichids);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
    $result = $stmt2->fetchColumn($getergebnis);

    if(empty($result) != empty($emptycheck))
    {
        echo($result.'<br>');
    }
}

function checkruf($p, $fachbereichid)
{	
    global $dbh;
    $emptycheck;
    $anzeige = 1;

    $stmt4 = $dbh->prepare('Select * from teilnehmerdaten where teilnehmerid = :p and fachbereichid = :fachbereichid
    and extract(year from startzeit) = :year');
    $stmt4->bindParam(':p', $p);
    $stmt4->bindParam(':fachbereichid', $fachbereichid);
    $stmt4->bindParam(':year', $_GET["year"]);
    $stmt4->execute();
    $resultid = $stmt4->fetchColumn(0);
    
    if(empty($resultid) != empty($emptycheck))
    {
        echo("<tr>");
        
        for($k = 1; $k < 7; $k++)
        {	
            echo('<td id="'.$p.'" style="color: black;" onclick="teilnehmereinsicht('.$p.')">');
            hervorruf($p, $zieher, $anzeige, $fachbereichid);
            echo('</td>');
            $zieher++;
        }
        $zieher = 0;
        $anzeige = 1;
    }
}
    
$emptycheck;

$stmt3 = $dbh->prepare('Select max(teilnehmerid) from teilnehmerdaten where fachbereichid = :fachbereich and extract(year from startzeit) = :year');
$stmt3->bindParam(':fachbereich', $fachbereich);
$stmt3->bindParam(':year', $_GET["year"]);
$stmt3->execute();
$resultid = $stmt3->fetchColumn(0);

for($i = 1; $i <= $resultid; $i++)
{		
    checkruf($i, $fachbereich);
}
    echo('</table>');
}


//Suche startet hier

if (isset($_GET["searchnow"]))
{
    $searcher = $_GET["searchnow"];
    header('Content-Type: text/plain; charset=utf-8');

    echo('<table id="table"> <tr> <!-- tr= Tabellen Zeile -->
				<th>Nachname</th> <!-- th = Tabellen Header Spalte --> 
				<th>Vorname</th>
				<th>Punktanzahl</th>
				<th>Datum</th>
				<th>Wohnort</th>
				<th>Voraus. Bildungsabschluss</th>
			</tr>');
    function hervorruf($id, $getergebnis)
    {
        $emptycheck;
        $qualifikation = $_POST['qualifikation'];
        global $dbh;

        $stmt2 = $dbh->prepare('Select name, vorname, erzielte_punkte, startzeit, wohnort, bildungsabschluss from teilnehmerdaten 
                            where teilnehmerid = :id');
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
        $result = $stmt2->fetchColumn($getergebnis);

        if(empty($result) != empty($emptycheck))
        {
           echo($result.'<br>');
        }
    }

    function checkruf($p)
    {	
        global $dbh;
        $emptycheck;
        $anzeige = 1;

        $stmt4 = $dbh->prepare('Select * from teilnehmerdaten where teilnehmerid = :p');
        $stmt4->bindParam(':p', $p);
        $stmt4->execute();
        $resultid = $stmt4->fetchColumn(0);
    
        if(empty($resultid) != empty($emptycheck))
        {
            echo("<tr>");
        
            for($k = 1; $k < 7; $k++)
            {	
                echo('<td id="'.$p.'" style="color: black;" onclick="teilnehmereinsicht('.$p.')">');
                hervorruf($p, $zieher);
                echo('</td>');
                $zieher++;
            }
        $zieher = 0;
        $anzeige = 1;
        }   
    }
    
    $emptycheck;

    $stmt3 = $dbh->prepare("select * from teilnehmerdaten
    where erzielte_punkte LIKE '%".$searcher."%' or bildungsabschluss LIKE '%".$searcher."%' or name LIKE '%".$searcher."%' 
    or vorname LIKE '%".$searcher."%' or startzeit LIKE '%".$searcher."%' or wohnort LIKE '%".$searcher."%'");
    $stmt3->execute();
    $resultid = $stmt3->fetchAll();
    $saveid;
    $stmt19 = $dbh->prepare("select max(teilnehmerid) from teilnehmerdaten
    where erzielte_punkte LIKE '%".$searcher."%' or bildungsabschluss LIKE '%".$searcher."%' or name LIKE '%".$searcher."%' 
    or vorname LIKE '%".$searcher."%' or startzeit LIKE '%".$searcher."%' or wohnort LIKE '%".$searcher."%'");
    $stmt19->execute();
    $maxresultid = $stmt19->fetchColumn(0);
    //echo($maxresultid.'test');
    for($i = 0; $i <= $maxresultid; $i++)
    {	
        
        if(isset($resultid[$i][0]) == true)
        {   
            $saveid= $resultid[$i][0]; 
            checkruf($saveid);
        }
    }
//echo('</table>');
}

?>