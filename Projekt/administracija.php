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
$query = "SELECT * FROM baza";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result)) {
 echo'<div class="content_wrapper" >';
 echo '<form enctype="multipart/form-data" action="" method="POST">
 <div class="form-item">
 <label for="title">Naslov vjesti:</label>
 <div class="form-field">
 <input type="text" name="title" class="form-field-textual" 
value="'.$row['naslov'].'">
 </div>
 </div>
 <div class="form-item">
 <label for="about">Kratki sadržaj vijesti (do 50 
znakova):</label>
 <div class="form-field">
 <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="content">Sadržaj vijesti:</label>
 <div class="form-field">
 <textarea name="content" id="" cols="30" rows="10" class="form-    field-textual">'.$row['tekst'].'</textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="pphoto">Slika:</label>
 <div class="form-field">
 <input type="file" class="input-text" id="pphoto" 
value="'.$row['slika'].'" name="photo"/> <br><img src="'  . $row['slika'] . '" width=100px>

 </div>
 </div>
 <div class="form-item">
 <label for="category">Kategorija vijesti:</label>
 <div class="form-field">
 <select name="category" id="" class="form-field-textual" 
value="'.$row['kategorija'].'">
 <option value="sport">Sport</option>
 <option value="kultura">Kultura</option>
 </select>
 </div>
 </div>
 <div class="form-item">
 <label>Spremiti u arhivu: 
 <div class="form-field">';
   if($row['arhiva'] == 0) {
 echo '<input type="checkbox" name="archive" id="archive"/> 
Arhiviraj?';
 } else {
 echo '<input type="checkbox" name="archive" id="archive" 
checked/> Arhiviraj?';
 }
 echo '</div>
 </label>
 </div>
 </div>
 <div class="form-item">
 <input type="hidden" name="id" class="form-field-textual" 
value="'.$row['id'].'">
 <button type="reset" value="Poništi">Poništi</button>
 <button type="submit" name="update" value="Prihvati"> 
Izmjeni</button>
 <button type="submit" name="delete" value="Izbriši"> 
Izbriši</button>
 </div>
</form>';
echo "</div>  ";
echo "<div class='footer' style= 'justify-content: center; display: flex; background-color: black;color:white; height: 100px;'>";
echo "<h3>Ivan Hribar</h3>";
echo "</div>";
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
   }
if(isset($_POST['update'])){
$picture = $_FILES['photo']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$id=$_POST['id'];
$query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', 
slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
$result = mysqli_query($dbc, $query);
}
   
}
?>
</div>   

</body>
</html>