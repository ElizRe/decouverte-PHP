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
  include_once('menu.php');
   include_once('cnxn.php');
  ?>
  <?php
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




          <div class="contents">
            <h1> Inscription</h1>
          </div>
          <div class="signup">
            <form id='signup' action='inscription.php' method='post'>
              <fieldset>
                <legend>Signup</legend>
                <label for='pseudo'>Pseudo:</label>
                <input type='text' name='pseudo' maxlength="50" required />
                <label for='pass'>mot de pass 1:</label>
                <input type='password' name='pass' maxlength="50" />
                <label for='pass'>mot de pass 2*:</label>
                <input type='password' name='confirm' maxlength="50" />
                <input type='reset' name='Save' value='Effacer' />
                <input type='submit' name='Save' value='Submit' />
              </fieldset>
            </form>
          </div>
</body>
</html>