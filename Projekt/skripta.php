<?php

$dbc = mysqli_connect('localhost', 'root', '', 'vijesti') or 
die('Error connecting to MySQL server.'. mysqli_connect_error());

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$date=date('d.m.Y.');
if (isset($_POST['archive'])){

    $archive = true;
}
else{
    $archive = false ;

}

if(isset($_POST['submit'])){
    $img_name=$_FILES['photo']['name'];
	$tmp_img_name=$_FILES['photo']['tmp_name'];
    $folder='img/';
	copy($tmp_img_name,$folder.$img_name);
}

$photo=$folder.$img_name;


$query = "INSERT INTO baza (datum, naslov, sazetak, tekst, slika, kategorija, 
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$photo', 
'$category', '$archive')";

$result = mysqli_query($dbc, $query) or die('Error querying databese.');

mysqli_close($dbc);
header('Location: unos.html');
?>