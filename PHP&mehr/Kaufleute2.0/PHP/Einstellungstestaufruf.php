<?php
session_start();
if(isset($_POST["takesessionid"]) == true)
{
	$_SESSION["bereich"] = 3;
	$_SESSION['teilnehmerid'] = $_POST["taketeilnehmerid"];
	$_SESSION["sessionid"] = $_POST["takesessionid"];
}

if($_SESSION["bereich"] != 3){
	header("Location: login_form.php");
}
include_once ("datenbankverbindung.php");
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/Kaufleute2.0/CSS/Einstellungstestdesign.css" />
		<title>Einstellungstest</title>
</head>
<body id="bodies">
<?php echo('<h5 style="position: fixed; top: -1em; left: 3.5em;">Teilnehmerid:'.$_SESSION["teilnehmerid"].'</h5>'); ?>
<div id="loadmod" style="z-index: 5;">


<div id="aufgaben_weiterleitung">
	<div class="dropdown">
 		<button class="dropbtn">Aufgaben</button>
  			<div class="dropdown-content">
  				<p onclick="aufgabenwahl(0)" id="Aufgabe 0" name="aufgabe" value="Aufgabe 0" >Start</p>
  				<?php
  					for($i = 1; $i < 26; $i++)
  					{
	 					echo('<p onclick="aufgabenwahl('.$i.')" name="aufgabe" id="Aufgabe '.$i.'" >Aufgabe '.$i.'<a name="checksend" value="Aufgabe '.$i.'" style="visibility: hidden;"> &#10004;</a></p>');
  					}
  				?>
			  </div>
			  </div>
	<!--<select id="aufgabensicht" style="position: absolute; top: -6em;width: 9em; height: 2em; font-size: 1vw; color: white; border: 1px solid black; text-align: center; background-color: dodgerblue;" onchange="aufgabenwahl()">
		<option value="Aufgabe 0" >Start</option>
		<?php
			/*for($i = 1; $i < 26; $i++)
			{
				echo('<option value="Aufgabe '.$i.'">Aufgabe '.$i.'</option>');
			}*/
		?>
	</select>-->
</div>

<div style="position: absolute; top: 2em; left: 16.5em; color: #4f81bd; width: 50%;">
	<div>
		<p id="ausgabe"> </p>
	</div>
<div>

<div class="aufgaben">
<form action="abschluss.php" method="post">
	<h1 style="visibility: hidden;"name="bereich">4</h1>
	<input id="abschluss" class="btn_effects abgang" style="position: fixed; font-size: 1vw; top: 3.4em; left: 83em;" autocomplete="off" type="submit" onclick="wait()" value="Einstellungstest abschlie&szlig;en"/>
</form> 
</div>
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
<!--<p id="schnitt" style="position:absolute; left: -10em;"></p>-->
</body>
</html>
<script>
	var abfrage = new XMLHttpRequest();

	function aufgabenwahl($test) 
	{

		var aufgabe = document.getElementsByName('aufgabe')[$test].id;
		//alert(document.getElementsByName('aufgabe')[0].id);
 		abfrage.open("GET", "Aufgabenwiedergabe.php?aufgabe="+ aufgabe, true);
  		abfrage.send();

		// Auf eine Antwort wartens
		abfrage.onreadystatechange = function()
		{
			if (abfrage.readyState == 4 && abfrage.status == 200)
			{
				// Die Antwort des Servers ausgeben
				document.getElementById("ausgabe").innerHTML = abfrage.responseText;
				if(endlesshidden12 == true)
				{
					document.getElementById('aufgabe12a').style.visibility = 'hidden';
				}
			}
	  	}
	}
	/*function aufgabenwahl() {
		
	var aufgabe = document.getElementById("aufgabensicht").value;

 	abfrage.open("GET", "Aufgabenwiedergabe.php?aufgabe="+ aufgabe, true);
  	abfrage.send();

 		// Auf eine Antwort wartens
		abfrage.onreadystatechange = function()
		{
  			if (abfrage.readyState == 4 && abfrage.status == 200)
  			{
				// Die Antwort des Servers ausgeben
				document.getElementById("ausgabe").innerHTML = abfrage.responseText;
				if(endlesshidden12 == true)
				{
					document.getElementById('aufgabe12a').style.visibility = 'hidden';
				}
  			}
  		}
	}*/
	function abgabe(aufgabenid)
	{
		var answers = new Array();
		var b = 0;

		var aufgabenpos = new Array('1', '6', '18', '8', '9', '8', '5', '32', '5', '14', '15', '34'
								    , '1', '6', '5', '1', '7', '6', '3', '12', '1', '5', '74', '16', '1');
		var c = aufgabenid - 1;
		while(b < aufgabenpos[c])
		{	
			answers[b] = document.getElementsByName(aufgabenid)[b].value+'-';
			if(answers[b] == '-')
			{
				answers[b] = '--';
			}
			//alert(answers[b]);
			b++;
		}
			document.getElementsByName('checksend')[aufgabenid-1].style.visibility = 'visible';
			abfrage.open("GET", "datenschnittstelle.php?answer="+ answers +"&aufgabenid=" + aufgabenid, true);
			abfrage.send();
			abfrage.onreadystatechange = function()
   			{
				if(abfrage.readyState == 4 && abfrage.status == 200)
		 		{
		   			// Die Antwort des Servers ausgeben
		   			document.getElementById("schnitt").innerHTML = abfrage.responseText;
		 		}
				aufgabenwahl(aufgabenid+1);
	 		}
			
	}
	var hidden = false;
	var endlesshidden12 = false;
	function block()
	{
		hidden = !hidden;
		if (hidden) 
		{
			document.getElementById('aufgabe12a').style.visibility = 'hidden';
			endlesshidden12 = true;
		}
		if(hidden) 
		{
			document.getElementById('aufgabe12').style.visibility = 'visible';
		}			
	}
	history.pushState(null, null);
    			window.onpopstate = function ()
				{
        			history.go(1);
    			};

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
			document.getElementById("load").style.filter="";
		}			
	}		
</script>
