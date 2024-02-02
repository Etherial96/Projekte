<?php 
	session_start();
	//Hier könnte eine Datenbankverbindung hin
	//include_once ("datenbankverbindung.php");

	// Variable initialisation
	$username = $password = "";
	$error = "";
	
	if(isset($_POST["login"])){
		// Check and limit input to characters, digits and dot only
		if (!preg_match('/[^A-Za-z0-9.]/', $_POST["username"]) && !preg_match('/[^A-Za-z0-9.]/', $_POST["password"])) // '/[^a-z\d]/i' should also work.
		{
			// Put all inputted data from global variables inside the local ones for checking
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Sql-Statements
			$sth = $dbh->prepare('Select * from login WHERE username = :username');
			$sth->bindParam(":username", $username, PDO::PARAM_STR);
			$sth->execute();

			$result = $sth->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows

			foreach($result as $row){
				// If no results are present
				if(!row){
					$error = "Ihre Username/Passwort Kombination ist nicht richtig!";
				}
				else{
					// Check password input is the hashed password
					if(password_verify($password, $row['password']) && $row['id'] == 0){
						// Update the global variables
						$_SESSION['bereich'] = 1;
						header('Location: einstellungstest_tabelle.php');
					}
					else if(password_verify($password, $row['password']) && $row['id'] == 1)
					{
						$_SESSION['bereich'] = 2;
						header('Location: teilnehmerformular.php');
					}
					else if(password_verify($password, $row['password']) && $row['id'] == 2)
					{
						$_SESSION['bereich'] = 6;
						header('Location: wiedereinstieg.php');
					}
					else{
						// Error Username and/or password is/are wrong!
						$error = "Ihre Username/Passwort Kombination ist nicht richtig!";
					}
				}
			}
		}
		else {
			$error = "Ihr Username oder/und Passwort ist/sind falsch.";
		}
	}
?>
<!DOCTYPE html>
<html lang="de"> 
<head>
	<title>Login</title>
	<link rel="stylesheet" href="..\CSS\login_styles.css"> <!-- CSS here -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src=""></script> --> <!-- Javascript here -->
</head>
<body>
	<form action="" method="post">
		<!-- Div Container Logo -->
		<div id="logo" style="display: flex; justify-content: center;">
			<img src="..\Bilder\BeispielLogo.png" style="width: 30%;" />
		</div>
		<!-- DIV for $message output if the fields are not filled correctly -->
		<?php echo '<div id="error"> ' . $error . '</div>'?>
		<!-- Div container class -->
		<div class="container">
			<label><h2 id="headline">Anmelde/Login - Formular</h2></label> <!-- Headline -->
			<!-- username/passwort Text and input -->
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Username eingeben" name="username" required>
			<label for="password"><b>Passwort</b></label>
			<input type="password" placeholder="Passwort eingeben" name="password" required>
			<!-- Submit button and remember me checkbox -->
			<button id="loginbutton" type="submit" name="login">Login</button>

			<p style="position: absolute; top: 22em; visibility: hidden;">zero</p>
		</div>
	</form> 
</body>
</html>