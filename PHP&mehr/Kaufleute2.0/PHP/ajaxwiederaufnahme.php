<?php
include_once ("datenbankverbindung.php");

//Suche startet hier

if (isset($_GET["searchnow"]))
{
    $searcher = $_GET["searchnow"];
    header('Content-Type: text/plain; charset=utf-8');
    echo('<table id="table"> <tr> <!-- tr= Tabellen Zeile -->
                <th>Teilnehmerid</th>
				<th>Nachname</th> <!-- th = Tabellen Header Spalte --> 
				<th>Vorname</th>
				<th>Datum</th>
                <th>S_id</th>
            </tr>');
            
    function hervorruf($id, $getergebnis)
    {
        $emptycheck;
        $qualifikation = $_POST['qualifikation'];
        global $dbh;

        $stmt2 = $dbh->prepare('Select teilnehmerid, name, vorname, startzeit, sessionid from teilnehmerdaten 
                            where teilnehmerid = :id');
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
        $result = $stmt2->fetchColumn($getergebnis);

        if(empty($result) != empty($emptycheck))
        {
           echo($result);
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
            
            echo('<tr>');
        
            for($k = 1; $k < 6; $k++)
            {	
                if($k == 1)
                {   
                    echo('<td id="'.$p.'" style="color: black;"><input type="text" style="display: none;" name="taketeilnehmerid" value="');
                    hervorruf($p, $zieher);
                    echo('"\>');
                }
                else if($k > 1 && $k < 5)
                {
                    echo('<td id="'.$p.'" style="color: black;">');
                }
                else if($k == 5)
                {
                    echo('<td id="'.$p.'" style="color: black; visibility: hidden;"><input type="text" style="display: none;" name="takesessionid" value="');
                    hervorruf($p, $zieher);
                    echo('"\>');
                }
                hervorruf($p, $zieher);
                echo('</td>');
                $zieher++;
            }
            echo('</tr>');
        $zieher = 0;
        $anzeige = 1;
        }   
    }
    
    $emptycheck;

    $stmt3 = $dbh->prepare("select * from teilnehmerdaten
    where teilnehmerid LIKE '%".$searcher."%' or erzielte_punkte LIKE '%".$searcher."%' or bildungsabschluss LIKE '%".$searcher."%' or name LIKE '%".$searcher."%' 
    or vorname LIKE '%".$searcher."%' or startzeit LIKE '%".$searcher."%' or wohnort LIKE '%".$searcher."%'");
    $stmt3->execute();
    $resultid = $stmt3->fetchAll();
    $saveid;
    $stmt19 = $dbh->prepare("select max(teilnehmerid) from teilnehmerdaten
    where teilnehmerid LIKE '%".$searcher."%' or erzielte_punkte LIKE '%".$searcher."%' or bildungsabschluss LIKE '%".$searcher."%' or name LIKE '%".$searcher."%' 
    or vorname LIKE '%".$searcher."%' or startzeit LIKE '%".$searcher."%' or wohnort LIKE '%".$searcher."%'");
    $stmt19->execute();
    $maxresultid = $stmt19->fetchColumn(0);

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