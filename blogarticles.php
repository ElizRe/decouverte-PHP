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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="contents">
  <h1>Blog Article</h1>
<?php

// define variables and set to empty values and protect against injection
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
if (isset ($_POST['blogarticles.php'])) {
    $id = $_GET['id'];
    var_dump($id);
    $sql ="SELECT * FROM `blog` WHERE _id = '.$id.'";
    $resultats = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($resultats)){
    var_dump($resultats);
    echo'<h2>'. $row['_title'].'</h2>';
    echo'<p>'. $row['_intro'].'</p>';
    echo'<p></span>Created <span>'. $row['_date'].'</span></p>';
    echo'<img name="myimage" src="'. $row['_image'].'" width="60" height="60"/>';
    echo'<p>'. $row['text'].'</p>';
    }
    }
    
?>
  </div>
  <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
            
</body>
</html>