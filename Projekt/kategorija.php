<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="content_wrapper" >
<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>
<section class="sport">
<?php
$query = "SELECT * FROM baza WHERE arhiva=0 AND kategorija='sport'";
$result = mysqli_query($dbc, $query);
 $i=0;
 while($row = mysqli_fetch_array($result)) {
 echo  '<h6> ';
 echo $row['kategorija'] ;
 echo '</h6>';
 echo  '<h1> ';
 echo $row['naslov'] ;
 echo '</h1>';
 echo  '<p> ';
 echo $row['sazetak'] ;
 echo '</p>';
 echo '<article>';
 echo'<div class="article">';
 echo '<div class="sport_img">';
 echo '<img src="' . $row['slika'] . '"';
 echo '</div>';
 echo  '<p> ';
 echo $row['tekst'] ;
 echo '</p>';
 echo '<div class="media_body">';
 echo '<h4 class="title">';
 echo '<a href="clanak.php?id='.$row['id'].'">';
 echo $row['naslov'];
 echo '</a></h4>';
 echo '</div></div>';
 echo '</article>';
 }

?>
</div>   
<div class='footer' style= 'min-width: 100%;justify-content: center; display: flex; background-color: black;color:white; height: 100px; font-size:24px;align-items:center;'>
Ivan Hribar
</div>

    
</body>
</html>