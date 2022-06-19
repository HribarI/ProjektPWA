<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'vijesti');

		$name = $con->real_escape_string($_POST['name']);
		$password = $con->real_escape_string($_POST['password']);

		$sql = $con->query("SELECT lozinka FROM korisnik WHERE ime='$name'");
		if ($sql->num_rows > 0) {
		    $data = $sql->fetch_array();
		    if (password_verify($password, $data['lozinka'])) {
		        $msg = "You have been logged IN!";
				header('Location:administracija.php');
            } else
			    $msg = "Please check your inputs!";
        } else
            $msg = "Please check your inputs!";
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Password Hashing - Log In</title>
	<link rel="stylesheet" href="style.css">
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
 </ul>
        
        </nav>
     </div>
</header>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

					<form method="post" action="login.php">
					<input class="form-control" style='width: 300px; height: 40px;'  minlength="3" name="name" placeholder="Name..."><br>
					<input class="form-control" style='width: 300px; height: 40px;'name="prezime" placeholder="prezime..."><br>
					<input class="form-control" style='width: 300px; height: 40px;' minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
				</form>

			</div>
		</div>
	</div>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	<div class='footer' style= 'min-width: 100%;justify-content: center; display: flex; background-color: black;color:white; height: 100px; font-size:24px;align-items:center;'>
Ivan Hribar
</div>
</body>
</html>