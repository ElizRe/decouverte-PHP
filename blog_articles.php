<?php
  session_start();
  include_once 'menu.php';
  include_once('cnxn.php'); 
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
  <div class="contents">
  <h1>Blog Article</h1>
<?php

// define variables and set to empty values
$id = $title  = $image = $intro = $text = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = test_input($POST["id"]);
  $title = test_input($_POST["title"]);
  $intro = test_input($_POST["intro"]);
  $image = test_input ($_POST["image"]);
  $text = test_input($_POST["text"]);
  $date = test_input($_POST["date"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    $id = $_GET['id'];
    $sql="SELECT * FROM `blog` WHERE id ='$id'";
    $resultats = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultats);
    var_dump($resultats);
    echo'<h2>'.$row['title'].'</h2>';
    echo'<p>'.$row['intro'].'</p>';
    echo'<p></span>Created <span>'.$row['date'].'</span></p>';
    echo'<img name="myimage" src="'.$row['image'].'" width="60" height="60"/>';
    echo'<p>'.$row['text'].'</p>';
?>
  </div>
</body>
</html>