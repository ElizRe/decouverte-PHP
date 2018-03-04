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
  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
    include_once('menu.php');
    include_once('cnxn.php');

// define variables and set to empty values and protect against injection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pseudo = test_input($_POST["pseudo"]);
  $pass = test_input($_POST["pass"]);
  $confirm = test_input($_POST["confirm"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>
     
        <?php
// Insertion

if ( isset( $_POST[ 'pseudo' ] ) && isset( $_POST[ 'pass' ] ) ) {
  $pseudo = $_POST[ 'pseudo' ];
  $pass = $_POST[ 'pass' ];
  $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

if ($_POST["pass"] === $_POST["confirm"]) {
   // success!
}
else {
   die("Passwords do no match");
}
$sql = "SELECT * FROM members WHERE pseudo = '$pseudo'";
$resultat = mysqli_query($con, $sql);

if($resultat->num_rows>=1)
{
  die ("pseudo already exists");
} else {

  $sql="INSERT INTO members (pseudo, pass)
  VALUES
  ('$pseudo','$pass_hache')";

  $resultat = mysqli_query($con, $sql);

  if($resultat) {
      echo "record added";
  }
  else {
      echo "Not added";
  }
}}
?>
 <?php
if ( isset( $_POST[ 'pseudologin' ] ) ) {
// Vérification de la validité des informations

    if(password_verify($_POST["pass"],$pass_hache))
    echo "Welcome";

    else
    echo "Wrong Password";

// $_POST["password"] ---> Is The User`s Input
// $pass_hache ---> Is The Hashed Password You Have Fetched From DataBase
}
?>

<div class="container">
  <h1> Inscription</h1>
  <form action='inscription.php' method='post'>
    <legend>SIGN-UP</legend>
    <label for='pseudo'>Choose your Pseudo:</label>
    <input type='text' name='pseudo' maxlength="50" required />
    <label for='pass'>Type your password:</label>
    <input type='password' name='pass' maxlength="50" />
    <label for='pass2'>Re-type your password:</label>
    <input type='password' name='confirm' maxlength="50" />
    <input type='reset' name='Save' value='Effacer' />
    <input type='submit' name='Save' value='Submit' />
  </form>
</div>
          <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
            
</body>
</html>