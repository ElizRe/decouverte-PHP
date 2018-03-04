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
<h1>Blog</h1>
<?php
    include_once 'menu.php';
    include_once('cnxn.php');


    $sql="SELECT * FROM `blog` ORDER BY `date` DESC LIMIT 5";
    $resultats = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultats);
    while($reponse = mysqli_fetch_assoc($resultats)) {
?>

    <div class="card-large">
    <h2><?php echo $reponse['title'] ?></h2>
    <img src="<?php echo $reponse ['image'];?>" />
    <p><?php echo $reponse['intro'] ?></p><br/>
    <p><?php echo $reponse['date'] ?></p>
    <form method="get" action="blogarticles.php">
    <button name="id" value="'.$row['id'].'">See full blog article</button>
    </form>
    </div>

<?php

}

// define variables and set to empty values and protect against injection
    $title  = $image = $intro = $text = $date = "";

?>
 <?php
    $sql="INSERT INTO blog (title, intro, image, text, date)
    VALUES
    ('$title','$intro','$image','$text','$date')";

    $resultat = mysqli_query($con, $sql);

    if($resultat) {
        echo "record added";
    }
    else {
        echo "Not added";
    }

?>
<div class="contents">
  <h3>Add your Blog article here:</h3>
  <form action="blog.php" method="post">
    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input name="title" id="title" /></td>
        </tr>
        <tr>
        <td><label for="intro">intro</label></td>
            <td><input name="intro" id="intro"/></td>
            <td><label for="image">image</label></td>
            <td><input name="image" id="image"/></td>
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
  <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
            
</body>
</html>