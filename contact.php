<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP EXO</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);

// inject the menu into each page
  include_once('menu.php');
  include_once('cnxn.php');
  ?>
  <?php
// define variables and set to empty values and protect against injection
$objet = $message = $thematique = $useracct = $age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $objet = test_input($_POST["objet"]);
  $message = test_input($_POST["message"]);
  $thematique = test_input($_POST["thematique"]);
  $account = test_input($_POST["useracct"]);
  $age = test_input($_POST["age"]);
  if(!$age) {
    $age = 0;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <div class="contents">
  <h1>Contact</h1>
  <?php

if( stripos ($message,"simplon")!== false) {
	die ("<p align='center'><font face='Arial' size='3' color='#FF0000'>Simplon is not valid</font></p>");
}
?> 
  <?php
echo "<h2>Votre Message:</h2>";
echo $objet;
echo "<br>";
echo $message;
echo "<br>";
echo $thematique;
echo "<br>";
echo $useracct;
echo "<br>";
echo $age;

$con = mysqli_connect("localhost", "root", "simplonco", "contact");
$sql="INSERT INTO contact (objet, message, thematique, useracct, age)
VALUES
('$objet', '$message','$thematique','$useracct','$age')";

mysqli_query($con, $sql);

echo "record added";

?>
  <form action="contact.php" method="post">
Objet: <input type="text" name="objet" required ><br>
Message: <textarea name="message" required rows="5" cols="40"></textarea><br>
Thématique <select name="thematique">
    <option value="question">Question</option>
    <option value="information">Information</option>
  </select>
  <br>
  <p>Do you have a user account?</p>
<input type="radio" class="radio" name="useracct" value="oui" checked> Oui<br>
  <input type="radio" class="radio" name="useracct" value="non"> Non<br>
Age: <input type="number" name="age"><br>
<input type="reset" value="Effacer">
  <input type="submit" value="Ok">
</form>
  </div>
</body>
</html>