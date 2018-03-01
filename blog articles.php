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
include_once 'menu.php';
include_once('cnxn.php');
?>
  <div class="contents">
  <h1>Blog Articles</h1>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM `blog` WHERE id ='$id'");
    $row = mysqli_fetch_assoc($result);
    echo'<h2>'.$row['title'].'</h2>';
    echo'<p>By <span>'.$row['Author'].'</span>Created <span>'.$row['date'].'</span></p>';
    echo'<img class="blogImg" src="'.$row['image'].'">';
    echo'<p>'.$row['texte'].'</p>';
    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
        if($_SESSION['pseudo'] == $row['author'])
        {
            echo 'success';
            

        }
    }
    ?>
  </div>
  </body>
  </html>  













<?php
// define variables and set to empty values
$title  = $intro = $text = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $intro = test_input($_POST["intro"]);
  $text = test_input($_POST["text"]);
  $date = test_input($_POST["date"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 <?php

$sql="INSERT INTO blog (title, intro, image, text, date)
VALUES
('$title','$intro','','$text','$date')";
echo $sql;

$resultat = mysqli_query($con, $sql);

if($resultat) {
    echo "record added";
}
else {
    echo "Not added";
}

?>
 <form action="blog.php" method="post">
    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input name="title" id="title" /></td>
        </tr>
        <tr>
        <img src="image/cat.jpeg" alt="cat" img name="image" style="height:100px;"></img>
        <td><label for="intro">intro</label></td>
            <td><input name="intro" id="intro"/></td>
            <td><label for="text">Text</label></td>
            <td><textarea name="text" id="text"></textarea></td>
            <td><label for="date">date</label></td>
            <td><input name="date" type="date"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Post" /></td>
        </tr>
    </table>
</form>
  </div>
</body>
</html>