
<?php
	$msg = "";
	if (isset($_POST['razina'])){

		$razina = true;
	}
	else{
		$razina = false ;
	
	}
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'vijesti');
		$name = $con->real_escape_string($_POST['name']);
		$prezime = $con->real_escape_string($_POST['prezime']);
		$korisnicko_ime = $con->real_escape_string($_POST['korisnicko_ime']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($password != $cPassword)
			$msg = "Please Check Your Passwords!";
		else {
			$hash = password_hash($password, CRYPT_BLOWFISH);
			$con->query("INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES ('$name', '$prezime', '$korisnicko_ime', '$hash', '$razina')");
			$msg = "You have been registered!";
		}
		
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Password Hashing - Register</title>
	<link rel="stylesheet" href="style.css">
</head>
</head>
<body>
<header class="Header">
        <div class="lemonde_logo">
       
        </div>
        <div class="crta">
        <nav>
        <ul class="main nav navbar-nav">
 <li>
 <a style="text-decoration: none;" href="index.php" class="">Početna</a>
 </li>
 <li>
 <a  style="text-decoration: none;" href="kategorija.php?id=sport" class="">Sport</a>
 </li>
 <li>
 <a style="text-decoration: none;" href="kategorija.php?id=kultura" class="">Kultura</a>
 </li>
 <li>
 <a  style="text-decoration: none;" href="administracija.php" class="">Administracija</a>
 </li>
 <li>
 <a  style="text-decoration: none;" href="login.php" class="">Login</a>
 </li>
 </ul>
        
        </nav>
     </div>
</header>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="register.php">
					<input class="form-control" style='width: 300px; height: 40px;'  minlength="3" name="name" placeholder="Name..."><br>
					<input class="form-control" style='width: 300px; height: 40px;'name="prezime" placeholder="prezime..."><br>
					<input class="form-control" style='width: 300px; height: 40px;' minlength="3" name="korisnicko_ime" placeholder="korisnicko_ime..."><br>
					<input class="form-control" style='width: 300px; height: 40px;' minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" style='width: 300px; height: 40px;' minlength="5" name="cPassword" type="password" placeholder="Confirm Password..."><br>
					<div class="form-item">
               		 <label>Razina:
                    <div class="form-field">
                        <input type="checkbox" name="razina">
                    </div>
                		</label>
            		</div>
					<input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>

				</form>

			</div>
		</div>
	</div>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	<div class='footer' style= 'min-width: 100%;justify-content: center; display: flex; background-color: black;color:white; height: 100px; font-size:24px;align-items:center;'>
Ivan Hribar
</div>
</body>
</html>