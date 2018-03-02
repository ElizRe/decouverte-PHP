<?php
  include_once 'menu.php';
  include_once('cnxn.php');

  session_start();
  // Vérification que nous sommes bien authentifié
  // Si nous sommes pas authentifié rediriger vers la page de connexion.
  if( !isset($_SESSION['pseudo'])) {
    header ('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
// define variables and set to empty values
$title  = $image = $intro = $description = $startdate = $enddate =
$location = $createdate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $image = test_input($_POST["image"]);
  $intro = test_input($_POST["intro"]);
  $description = test_input($_POST["date"]);
  $startdate = test_input($_POST["startdate"]);
  $enddate = test_input($_POST["enddate"]);
  $location = test_input($_POST["location"]);
  $createdate = test_input($_POST["createdate"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

  // Find the data in the database
$sql="SELECT * FROM `events` ORDER BY `date` DESC";
$resultats = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultats);
?>
<?php
        echo '<img src="'.$row['image'].'" </img>';
        echo '<p>Created the '.$row['createdate'].'</p>';
        echo '<p>'.$row['title'].'</p>';
        echo '<p>'.$row['image'].'</p>';
        echo '<p>'.$row['intro'].'</p>';
        echo '<p>'.$row['description'].'</p>';
        echo '<p>'.$row['startdate'].'</p>';
        echo '<p>'.$row['enddate'].'</p>';
        echo '<p>'.$row['location'].'</p>';
        echo '<p>'.$row['createdate'].'</p></div>';
}
?>
</body>
</html>