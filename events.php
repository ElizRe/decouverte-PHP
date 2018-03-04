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
include_once 'menu.php';
include_once('cnxn.php');

session_start();
// Vérification que nous sommes bien authentifié
// Si nous sommes pas authentifié rediriger vers la page de connexion.
if( !isset($_SESSION['pseudo'])) {
  header ('Location: login.php');
}
?>
<h1>Events</h1>
<?php
  // define variables and set to empty values and protect against injection
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
} 

  // Find the data in the database 
  $sql="SELECT * FROM `events` ORDER BY `createdate`DESC";
  $resultats = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($resultats);
  while($reponse = mysqli_fetch_assoc($resultats)) {
?>
    
  <div class="container">
              <h2><?php echo $reponse['title'] ?></h2><br/>
              <img class="center" src="<?php echo $reponse ['image'];?>" />
              <p><?php echo $reponse['intro'] ?></p><br/>
              <p><?php echo $reponse['description'] ?></p><br/>
              <p>From:<?php echo $reponse['startdate'] ?></p><br/>
              <p>To:<?php echo $reponse['enddate'] ?></p><br/>
              <p>Where:<?php echo $reponse['location'] ?></p><br/>
              <p>Date added:<?php echo $reponse['createdate'] ?></p>
  </div>
<?php
  }

?>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
            
</body>
</html>