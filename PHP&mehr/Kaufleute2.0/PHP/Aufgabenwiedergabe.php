<?php
session_start();
include_once ("datenbankverbindung.php");

function loadinput()
{
    global $dbh;
    $inputfelder = array('1', '6', '18', '8', '9', '8', '5', '16', '5', '14', '15', '14'
    , '1', '6', '5', '1', '7', '6', '3', '12', '1', '5', '74', '16', '1');
    
    $abstandfeld = array('2', '8.9', '0.2', '9.3', '11.2', '0.2', '0.2', '2.55', '11', '4.65', '0.225', '11.4'
    , '7.1', '10', '3.2', '7.7', '9', '18.6', '13.75', '1.75', '30.3', '6.5', '11.1', '4.6', '10');
    $id = str_replace('Aufgabe', '',$_GET["aufgabe"]);
    
    //echo('<p style="position: absolute; top: 25em; left: 45em;">'.$id.' aufgabe '.$inputfelder[$id-1].'</p>');
    $aufgabengroesse = sizeof($answers);
    $emptycheck;
    $highid = $_SESSION['teilnehmerid'];
    $session = $_SESSION["sessionid"];
    $aufgabendurchlauf = 0;
    $theone = 0;
    if($id < 25)
    {
        $stmt1 = $dbh->prepare('Select teilnehmerantwort from teilnehmerergebnisse where teilnehmerid = :highid and sessionid = :session and aufgaben_id = :id order by aufgabenposid asc');
        $stmt1->bindParam(':highid', $highid);
        $stmt1->bindParam(':session', $session);
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();
        $resultanswer = $stmt1->fetchAll();

        if($id == 8)
        {
            $stmt2 = $dbh->prepare('Select teilnehmerantwort from teilnehmerergebnisse where teilnehmerid = :highid and sessionid = :session and aufgaben_id = 8.1 order by aufgabenposid asc');
            $stmt2->bindParam(':highid', $highid);
            $stmt2->bindParam(':session', $session);
            $stmt2->execute();
            $resulteightone = $stmt2->fetchAll();
        }
        else if($id == 12)
        {
            $stmt3 = $dbh->prepare('Select teilnehmerantwort from teilnehmerergebnisse where teilnehmerid = :highid and sessionid = :session and aufgaben_id = 12.1 order by aufgabenposid asc');
            $stmt3->bindParam(':highid', $highid);
            $stmt3->bindParam(':session', $session);
            $stmt3->execute();
            $resulttwelveone = $stmt3->fetchAll();
        }
    }
    else if($id == 25)
    {
        $stmt5 = $dbh->prepare('Select teilnehmerantwort from aufgabe25 where teilnehmerid = :highid and sessionid = :session and aufgaben_id = :id order by aufgabenposid asc');
        $stmt5->bindParam(':highid', $highid);
        $stmt5->bindParam(':session', $session);
        $stmt5->bindParam(':id', $id);
        $stmt5->execute();
        $resultanswer = $stmt5->fetchAll();
    }
    $position = $abstandfeld[$id-1];
    for($aufgabendurchlauf = 0; $aufgabendurchlauf < $inputfelder[$id-1]; $aufgabendurchlauf++)
    {   
        if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 1')
        {
            echo('<input style="position: absolute; top: 3.5em; left: 49.5em; min-height: 2.3em;" class="inputform registrierdesign" autocomplete="off" type="text" name="1" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
        }
        if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 2')
        {      
            echo('<input style="position:absolute; top: '.$position.'em; left: 46em;" class="inputform registrierdesign" autocomplete="off" type="text" name="2" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            $position += +4;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 3')
        {
            echo('<input style="position: absolute; top: '.$position.'em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="3" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += +2.9;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 4')
        {
            echo('<input style="position: absolute; top: '.$position.'em; left: 46em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="4" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += +2.9;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 5')
        {
            echo('<input style="position: absolute; top: '.$position.'em; left: 47em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="5" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += +2.9;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 6')
        {
            echo('<input style="position: absolute; top: '.$position.'em; left: 42.8em; min-height: 1.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="6" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            $position += +2.7;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 7')
        {
            echo('<input style="top: '.$position.'em; left: 42.3em; min-height: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="7" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            $position += +2.7;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 8')
        {
            
            if($theone == 0)
            {
                echo('
                <!-- Aufgabe 8 Info -->
                <div id="aufgabe8" class="aufgaben">
                    <img style="width: 100%" src="..\Bilder\aufgabe8_1.png" />
                </div>
            
                <!-- Aufgabe 8 Deutschlandskarte -->
                <div style="top: 7em;" class="aufgaben">
                    <img style="width: 100%" src="..\Bilder\aufgabe8_2.png" />															
                    <input style="position: absolute; left: 5em; top: 44.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[0][0].'"/>
                    <input style="position: absolute; left: 7em; top: 40em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[1][0].'"/> 
                    <input style="position: absolute; left: 8em; top: 28em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[2][0].'"/> 
                    <input style="position: absolute; left: 16em; top: 51em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[3][0].'"/>
                    <input style="position: absolute; left: 30em; top: 47em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[4][0].'"/> 
                    <input style="position: absolute; left: 16em; top: 35em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[5][0].'"/> 
                    <input style="position: absolute; left: 27em; top: 32em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[6][0].'"/> 
                    <input style="position: absolute; left: 30.5em; top: 24em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[7][0].'"/> 
                    <input style="position: absolute; left: 40em; top: 31em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[8][0].'"/> 
                    <input style="position: absolute; left: 42em; top: 24em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[9][0].'"/> 
                    <input style="position: absolute; left: 39.4em; top: 19.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[10][0].'"/>
                    <input style="position: absolute; left: 19em; top: 18em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[11][0].'"/> 
                    <input style="position: absolute; left: 15.7em; top: 13.2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[12][0].'"/> 
                    <input style="position: absolute; left: 22em; top: 11em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[13][0].'"/> 
                    <input style="position: absolute; left: 20em; top: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[14][0].'"/> 
                    <input style="position: absolute; left: 35em; top: 10em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resultanswer[15][0].'"/> 
                    
                    ');
                    echo('<!-- Aufgabe 8 Eingabefelder Teil B -->
                        <div style="top: 55em;" class="aufgaben"> 
                        <img style="width: 100%" src="..\Bilder\aufgabe8_3.png" />');
                $theone = 1;
            }
            echo('<input style="top: '.$position.'em; left: 14.5em; min-height: 1.60em; min-width: 4.8em; width: 4.8em;" class="inputform registrierdesign" autocomplete="off" type="text" name="8" value="'.$resulteightone[$aufgabendurchlauf][0].'" />');
            $position += +2.41;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 9')
        {
           echo('<input style="top: '.$position.'em; left: 41em; min-height: 1.6em; min-width: 1.9em; width: 1.9em;" class="inputform registrierdesign" autocomplete="off" type="text" name="9" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
           $position += +2.3;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 10')
        {  
            if($aufgabendurchlauf < 6 || $aufgabendurchlauf > 6)
            {
                echo('<input style="top: '.$position.'em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +2.48;
            }
            else if($aufgabendurchlauf == 6)
            {
                $position += 0.5;
                echo('<input style="top: '.$position.'em; left: 26em; min-height: 1.6em; max-width: 15.5em; width: 15.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="10" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.05;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 11')
        {
            echo('<input style="top: '.$position.'em; left: 44em; min-height: 1.8em; min-width: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="11" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += +2.64;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 12')
        {
            if($aufgabendurchlauf < 7)
            {
                echo('<input style="top: '.$position.'em; left: 2.6em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" />');
                $position += +2.75;
            }
            else if($aufgabendurchlauf > 6)
            {
                if($aufgabendurchlauf == 7)
                {
                    $position = $abstandfeld[11];
                }
                echo('<input style="top: '.$position.'em; left: 27.2em; min-height: 1.4em; max-width: 20em; width: 20em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" />');
                $position += +2.73;
            }   
            if($theone == 0 && $aufgabendurchlauf == 13)
            {
                echo('
                <input type="button" class="abgang"id="userblock" value="Absenden!" onClick="block();" />
                </div>
                <div class="aufgaben" style="visibility: hidden; top: 3em;" id="aufgabe12">
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
                
                <input style="top: 15em; left: 35em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Finnland -->
                <input style="top: 40.5em; left: 8.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Spanien -->
                <input style="top: 30em; left: 23em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Deutschland -->
                <input style="top: 29em; left: 31.6em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Polen -->
                <input style="top: 41em; left: 25em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Italien -->
                <input style="top: 34em; left: 16.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Frankreich -->
                <input style="top: 27.5em; left: 20em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Niederlande -->
                <input style="top: 29.8em; left: 19.8em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Belgien -->
                <input style="top: 19em; left: 28em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Schweden -->	
                <input style="top: 41.7em; left: 37em; min-height: 1.3em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12" /> <!-- Bulgarien -->
                <input style="top: 51em; left: 26em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12"  /> <!--Malta-->
                <input style="top: 25em; left: 35.5em; min-height: 1.4em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12" /> <!-- Litauen -->
                <input style="top: 22.3em; left: 35.8em; min-height: 1.4em; width: 1.5em;" autocomplete="off" class="inputform registrierdesign" type="text" name="12"  /> <!-- Lettland -->
                <input style="top: 20em; left: 36.2em; min-height: 1.4em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!--Estland-->
                <input style="top: 36.4em; left: 28em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!--Slowenien-->
                <input style="top: 38em; left: 29em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!-- Kroatien -->
                <input style="top: 37em; left: 37em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12"  />	 <!-- Rumänien -->	
                <input style="top: 46.5em; left: 34.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!--Griechenland -->
                <input style="top: 50.5em; left: 44.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!--Zypern-->
                <input style="top: 40em; left: 3.5em; min-height: 1.3em; width: 1.5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="12" /> <!--Portugal-->
    ');
            }
            
            /*if($aufgabendurchlauf < 2)
            {
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +2.8;
            }
            else if($aufgabendurchlauf == 2)
            {
                $position +=0.9;
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }
            else if($aufgabendurchlauf > 2)
            {
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }*/
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 13')
        {
            echo('<input style="top: '.$position.'em; left: 36.5em; min-height: 2em; max-width: 10em; width: 10em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="       Euro" name="13" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 14')
        {
            echo('<input style="top: '.$position.'em; left: 43em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="14" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            $position += +2.73;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 15')
        {
            if($aufgabendurchlauf < 3 || $aufgabendurchlauf > 3)
            {
                echo('<input style="top: '.$position.'em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" name="15" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +4.4;
            }
            else if($aufgabendurchlauf == 3)
            {
                $position += -0.3;
                echo('<input style="top: '.$position.'em; left: 38.2em; min-height: 2em; max-width: 15em; width: 7em;" class="inputform registrierdesign" autocomplete="off" type="text" name="15" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 4;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 16')
        {
            echo('<input style="top: '.$position.'em; left: 35.9em; max-width: 15em; width: 10.9em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="                       Sch&uuml;ler" name="16" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 17')
        {
            if($aufgabendurchlauf < 2)
            {
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +2.8;
            }
            else if($aufgabendurchlauf == 2)
            {
                $position +=0.9;
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }
            else if($aufgabendurchlauf > 2)
            {
                echo('<input style="top: '.$position.'em; left: 50em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="17" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 18')
        {
            if($aufgabendurchlauf < 2)
            {
                echo('<input style="top: '.$position.'em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +3.05;
            }
            else if($aufgabendurchlauf == 2)
            {
                $position +=0.3;
                echo('<input style="top: '.$position.'em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }
            else if($aufgabendurchlauf > 2)
            {
                echo('<input style="top: '.$position.'em; left: 46.05em; min-height: 2em; width: 2em;" class="inputform registrierdesign" autocomplete="off" type="text" name="18" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.8;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 19')
        {
            echo('<input style="top: '.$position.'em; left: 40.9em; min-height: 2em; max-width: 10em; width: 8.35em;" class="inputform registrierdesign" autocomplete="off" type="text"  placeholder="            ,      Mill." name="19" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            if($aufgabendurchlauf == 2)
            {
                echo('<input style="top: '.$position.'em; left: 40.9em; min-height: 2em; max-width: 10em; width: 8.35em;" class="inputform registrierdesign" autocomplete="off" type="text"  placeholder="            ,      %" name="19" value="'.$resultanswer[$aufgabendurchlauf][0].'"/>');
            }
            $position += 2.8;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 20')
        {
            echo('<input style="top: '.$position.'em; left: 38em; min-height: 1.7em; max-width: 8em; width: 7.7em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="         ,       Euro" name="20" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += 2.33;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 21')
        {
            echo('<input style="top: '.$position.'em; left: 42em; min-height: 1.9em; max-width: 8em; width: 8em;" class="inputform registrierdesign" autocomplete="off" type="text" placeholder="          ,       Euro" name="21" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += 2.33;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 22')
        {
            if($aufgabendurchlauf < 2)
            {
                echo('<input style="top: '.$position.'em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +3.4;
            }
            else if($aufgabendurchlauf == 2)
            {
                $position +=0.9;
                echo('<input style="top: '.$position.'em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.6;
            }
            else if($aufgabendurchlauf > 2)
            {
                echo('<input style="top: '.$position.'em; left: 49.1em; min-height: 2em; width: 2.1em;" class="inputform registrierdesign" autocomplete="off" type="text" name="22" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += 3.4;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 23')
        {
            if($aufgabendurchlauf < 37)
            {
                echo('<input style="position: absolute; font-size: 1vw; background-color: #fbd4b4; top: '.$position.'em; left: 45.1em; min-height: 1.8em; width: 1.4em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +2.21;
            }
            else if($aufgabendurchlauf > 36)
            {
                if($aufgabendurchlauf == 37)
                {
                    $position = 11.1;
                }
                echo('<input style="position: absolute; font-size: 1vw; background-color: #fbd4b4; top: '.$position.'em; left: 47.57em; min-height: 1.8em; width: 1.4em;" class="inputform registrierdesign" autocomplete="off" type="text" name="23" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
                $position += +2.21;
            }
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 24')
        {
            echo('<input style="background-color: #ffff66; top: '.$position.'em; left: 42.6em; min-height: 2.3em; width: 4.3em; max-width: 5em;" class="inputform registrierdesign" autocomplete="off" type="text" name="24" value="'.$resultanswer[$aufgabendurchlauf][0].'" />');
            $position += +2.96;
        }
        else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 25')
        {
            echo('<textarea style="width: 100%;" cols="100" rows="30" name="25">'.$resultanswer[$aufgabendurchlauf][0].'</textarea>');
            $position += +2.96;
        }
    }

}
if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 0')
{
    echo('
    <div style="position: absolute; min-width: 70em; right: 0em; right: -10em;" >
    <img id="logo" src="..\Bilder\BeispielLogo.png" style="position: absolute; top: -2em; left: 29em; height: 10em; width: 35%; border-radius: 20px;">
    <h3 style="text-align: center;color: gray; float:left; position: absolute; top: 7em; left: 22em;">Einstellungstest</h3>
    <h2 style="color: black; position: absolute; margin: 0 auto; top: 9.5em; left: 17em;"> Achtung! Wichtige Hinweise zur Bearbeitung! </h2>
	
    <!-- Input felder befinden sich hier! -->

    <!-- Zwei Paragraphen mit unterschiedlichen ids angegeben, wegen Textverarbeitung -->
    <p style="color: black;text-align: left; min-width: 50em; position: absolute; top: 16em; left: 25.5em;">
        F&uuml;r die Bearbeitung der Aufgaben stehen Ihnen 180 Minuten Zeit zur Verf&uuml;gung. Die Aufga-<br />
        ben sollten zwar z&uuml;gig, aber sorgf&auml;ltig bearbeitet werden. Daher empfehlen wir Ihnen, zu-<br />
        n&auml;chst die Aufgaben zu machen die Ihnen leicht erscheinen. Stellen Sie die Aufgabenstellun-<br />
        gen, die Ihnen besonders schwer fallen zun&auml;chst zur&uuml;ck, um sie dann im zweiten Durchgang<br />
        zu l&ouml;sen.
    </p>

    <h3 style="text-align:center; top: 36em; position: absolute; padding-bottom: 3em; left: 35em;"> Viel Erfolg! </h3>
    <img style="top: 44em; left: 60em; position:absolute; width:10%;" src="..\Bilder\anfang_einstellungstest.png"/>
</div>
    ');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 1')
{
        echo('<!-- Aufgabe 1 -->
        <div id="aufgabe1" value="aufgabe1" style="top: 1em;" class="aufgaben">
        <img style="width: 100%;" src="..\Bilder\aufgabe1.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antwort senden" onclick="abgabe(1)"/>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 2')
{
    echo('<div id="aufgabe2" class="aufgaben"><img style="width: 100%;" src="..\Bilder\aufgabe2.png" />');
    loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(2)"/>
    
    </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 3')
{
    /*echo('<div id="aufgabe3" class="aufgaben">
          <img style="width: 100%;" src="..\Bilder\aufgabe3_1.png" />

            </div><!-- Aufgabe 3 Eingabefelder -->
            <div style="top: 16em;" class="aufgaben">
           <img style="width:100%;" src="..\Bilder\aufgabe3_2.png" />');*/
           echo('<div id="aufgabe3" class="aufgaben">
           <h3><u style="color: black; background-color: red;">Aufgabe 3 (18 Punkte)</u></h3>
           <p style="color: black;">Tageszeitungen gliedern sich in der Regel nach thematischen Schwerpunkten. Eine Tageszeitung unterscheidet bei der Zuordnung ihrer Nachrichten und Berichte folgende Teile:</p>
           <strong><table class="table">
           <tbody style="text-align: center; float: left; font-size: 90%; color: black;">
           <tr>
               <td>Politik</td>
               <td>[1]</td>
               <td>Sport</td>
               <td>[5]</td>
           </tr>
           <tr>
               <td>Lokales</td>
               <td>[2]</td>
               <td>Kultur</td>
               <td>[6]</td>
           </tr>
           <tr>
               <td>Wirtschaft</td>
               <td>[3]</td>
               <td>Freizeit</td>
               <td>[7]</td>
           </tr>
           <tr>
               <td>Technik</td>
               <td>[4]</td>
           </tr>
       </tbody>
   </table></strong>
   <p style="color: black;">In welchen Teilen dieser Tageszeitung sind nach Ihrer Meinung die untenstehenden Artikel erschienen? <br>
   Tragen Sie die Kennziffer des Zeitungsteiles in das jeweilige K&auml;chen ein!</p>
             </div><!-- Aufgabe 3 Eingabefelder -->
             <div style="top: 22em;" class="aufgaben">
            <img style="width:100%;" src="..\Bilder\aufgabe3_2.png" />');
    loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(3)"/>
    </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 4')
{
    echo('<div id="aufgabe4" class="aufgaben">
          <img style="width: 100%;" src="..\Bilder\aufgabe4.png" />');
    loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(4)"/>

    </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 5')
{
    echo('<!-- Aufgabe 5 -->
            <div id="aufgabe5" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe5.png" />');
    loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(5)"/>
             </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 6')
{
        echo(' <!-- Aufgabe 6 Info-->
        <div id="aufgabe6" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe6_1.png" />
        </div>
    
        <!-- Aufgabe 6 Eingabefelder -->
        <div style="top: 20em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe6_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(6)"/>

        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 7')
{
        echo('<!-- Aufgabe 7 Info-->
        <div id="aufgabe7" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe7_1.png" />
        </div>
    
        <!-- Aufgabe 7 Eingabefelder -->
        <div style="top: 15em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe7_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(7)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 8')
{
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(8)"/>
            </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 9')
{
        echo('<!-- Aufgabe 9 -->
        <div id="aufgabe9" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe9.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(9)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 10')
{
        echo('<!-- Aufgabe 10 -->
        <div id="aufgabe10" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe10.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(10)"/>

        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 11')
{
        echo('<!-- Aufgabe 11 Info -->
        <div id="aufgabe11" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe11_1.png" />
        </div>
    
        <!-- Aufgabe 11 Eingabefelder -->
        <div style="top: 12em;" class="aufgaben"> 
            <img style="width: 100%;" src="..\Bilder\aufgabe11_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(11)"/>

        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 12')
{
        echo('<!-- Aufgabe 12 A)-->
            <div id="aufgabe12a" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe12_1.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(12)"/>
        </div>
    </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 13')
{
        echo('<!-- Teilbereich 2 -->
        <div style="position: absolute; width: 100%;" >
            <h1 style="font-size: 2.4vw; background-color: #ffff00;">Teil II (mathematischer Bereich)</h1>
    
            <!-- Aufgabe 13 -->
            <div id="aufgabe13" style="top: 5em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe13.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antwort senden" onclick="abgabe(13)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 14')
{
        echo('<!-- Aufgabe 14 -->
        <div id="aufgabe14" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe14.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(14)"/>

        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 15')
{
        echo('<!-- Aufgabe 15 -->
        <div id="aufgabe15" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe15.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(15)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 16')
{
        echo('<!-- Aufgabe 16 -->
        <div id="aufgabe16" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe16.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antwort senden" onclick="abgabe(16)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 17')
{
        echo('<!-- Aufgabe 17 Info-->
        <div id="aufgabe17" class="aufgaben">
        <img style="width: 64%;" src="..\Bilder\aufgabe17_1.png" />
        </div>
        <!-- Aufgabe 17 Eingabefelder -->
        <div style="top: 31em; right: 0.5em;"class="aufgaben">
            <img style="width: 95%;" src="..\Bilder\aufgabe17_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(17)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 18')
{
        echo('<!-- Aufgabe 18 -->
            <div id="aufgabe18" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe18.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(18)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 19')
{
        echo('<!-- Aufgabe 19 -->
        <div id="aufgabe19" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe19.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(19)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 20')
{
        echo('<!-- Aufgabe 20 Info -->
        <div id="aufgabe20" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe20_1.png" />
        </div>
    
        <!-- Aufgabe 20 Eingabefelder -->
        <div style="top: 43em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe20_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(20)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 21')
{
        echo('<!-- Aufgabe 21 -->
        <div id="aufgabe21" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe21.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antwort senden" onclick="abgabe(21)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 22')
{
        echo('<!-- Aufgabe 22 Aufgabestellung -->
        <div style="left: 30em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe22_1.png" />
        </div>
        <!-- Aufgabe 22 Bild-->
        <div class="aufgaben" id="aufgabe22">
            <img style="width: 100%;" src="..\Bilder\aufgabe22_2.png"  />
        </div>
        <!-- Aufgabe 22 Eingabefelder -->
        <div style="top: 38em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe22_3.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(22)"/>

        </div>
    </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 23')
{
    echo('
    <!-- Teilbereich 3 -->
    <div width: 100%;" >
        <h1 style="font-size: 2.4vw; background-color: #ffff00;">Teil III (sprachlicher Bereich)</h1>

        <!-- Aufgabe 23 Aufgabestellung -->
        <div id="aufgabe23" style="top: 5em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe23_1.png" />
        </div>
        <div style="top: 27em; line-height: 0%" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe23_2.png" />
            <img style="width: 100%;" src="..\Bilder\aufgabe23_3.png" />
            <!-- Aufgabe 23 Aufgabefeld 3 -->
            <img style="width: 100%;" src="..\Bilder\aufgabe23_4.png" />
        ');
        loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(23)"/>
          </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 24')
{
        echo('<!--Aufgabe 24 Info -->
        <div id="aufgabe24" class="aufgaben">
            <img style="width: 100%" src="..\Bilder\aufgabe24_1.png" />
        </div>
    
        <!-- Aufgabe 24 Eingabefelder -->
        <div style="top: 10em;" class="aufgaben">
            <img style="width: 100%;" src="..\Bilder\aufgabe24_2.png" />');
        loadinput();
        echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Antworten senden" onclick="abgabe(24)"/>
        </div>');
}
else if(isset($_GET["aufgabe"]) && $_GET["aufgabe"] == 'Aufgabe 25')
{
    echo('<!-- Aufgabe 25 -->
        <div id="aufgabe25" class="aufgaben">
        <img style="width: 100%;" src="..\Bilder\aufgabe25_1.png" />
        </div>
    
        <div style="top: 15em;" class="aufgaben">');
    loadinput();
    echo('<input id="abschluss" style="position: fixed; left: 58em; top: 25em; width: 9em;" class="btn_effects abgang" autocomplete="off" type="submit" value="Schreiben senden" onclick="abgabe(25)"/>
        </div>');
}
?>