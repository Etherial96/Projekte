<?php
	session_start();
	$_SESSION['abmelden'] == 9;
	if($_SESSION['abmelden'] != 9)
	{	
		$_SESSION['bereich'] = 9; 
		header("Location: login_form.php");
	}
	else if($_SESSION['abmelden'] == 9)
	{
		$_SESSION['bereich'] = 9; 
		$_SESSION['abmelden'] = 9;
	}
?>


<!DOCTYPE html>
<html lang="de"> 
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<link rel="stylesheet" href="..\CSS\login_styles.css"> <!-- CSS here -->
	<title>Abmelden</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src=""></script> --> <!-- Javascript here -->
</head>
<body>
		<!-- Div Container Logo-->
		<div id="logo">
			<img src="..\Bilder\BeispielLogo.jpg" style="width: 100%; border-radius: 20px;"/>
		</div>
		<!-- DIV for $message output if the fields are not filled correctly -->
		<?php echo '<div id="error"> ' . $error . '</div>'?>
		<!-- Div container class -->
		<div class="container">
			<label><h2 id="headline">Sie haben sich erfolgreich abgemeldet.</h2></label> <!-- Headline -->
			<label><h5 style="text-align:center;"><a href="../Kaufleute2.0/PHP/login_form.php" id="headline">Zur&uuml;ck zum Login</a></h5></label>
		</div>
</body>
</html>