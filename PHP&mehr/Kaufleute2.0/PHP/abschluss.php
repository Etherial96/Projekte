<?php
    session_start();
	//$_SESSION["bereich"]= $_POST['bereich'];
	session_destroy();
	error_reporting(0);
    /*if($_SESSION["bereich"] != 4)
    {
		header("Location: login_form.php");
	}*/
	/*if($_SESSION["bereich"] == 4)
	{
		$_SESSION["bereich"] = 5;
		session_destroy();
	}*/
?>
<!DOCTYPE html>
<html lang="de">
<head>

<title> Abschluss der Teilnahme </title>
<link rel="stylesheet" href="..\CSS\login_styles.css"> <!-- CSS here -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form action="" method="post">
		<!-- Div Container image Logo-->
		<div id="logo" style="display: flex; justify-content: center;">
			<img src="..\Bilder\BeispielLogo.png" style="width: 30%;" />
		</div>
		<!-- DIV for $message output if the fields are not filled correctly -->
		<?php echo '<div id="error"> ' . $error . '</div>'?>
		<!-- Div container class -->
		<div class="container">
			<label><h2 id="headline">Sie haben den Test nun abgeschlossen.</h2></label> <!-- Headline -->
			<!-- username/passwort Text and input -->
		</div>
	</form> 
</body>
</html>
