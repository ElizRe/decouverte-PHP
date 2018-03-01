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
<h1>Blog</h1>
<?php
include_once 'menu.php';
include_once('cnxn.php');
?>
<?php

$sql="SELECT * FROM `blog` ORDER BY `date` DESC";
$resultats = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultats);
while($reponse = mysqli_fetch_assoc($resultats)) {
    ?>

    <div class="blog-item">
    <h2><?php echo $reponse['title'] ?></h2>
    <img src="<?php echo $reponse ['image'];?>" />
    <p><?php echo $reponse['intro'] ?></p><br/>
    <p><?php echo $reponse['text'] ?></p><br/>
    <p><?php echo $reponse['date'] ?></p>
    </div>

    <?php
    //echo $reponse['title'];
}

// define variables and set to empty values
$title  = $intro = $text = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $image = test_input($_POST)["image"]);
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

$sql="INSERT INTO blog (title, intro, image, text, date)
VALUES
('$title','$intro','$image','$text','$date')";
echo $sql;

$resultat = mysqli_query($con, $sql);

if($resultat) {
    echo "record added";
}
else {
    echo "Not added";
}

?>
<div class="contents">
  
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
            <td><label for="image">intro</label></td>
            <td><input name="image" id="intro"/></td>
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

<div class="seeblog">
<?php
                echo '<div class="ticketImg"><img src="'.$row['image'].'"></div>';
                echo '<div  class="ticketText"><p>'.$row['date'].'</p>';
                echo '<p>'.$row['title'].'</p>';
                echo '<p>'.$row['intro'].'</p>';
                echo '
                <form method="get" action="blog_articles.php">
                <button name="id" value="'.$row['id'].'">See more</button>
                </form>
                    </div>
                </div>';
?>
 
</body>
</html>