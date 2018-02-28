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
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pseudologin = test_input($_POST["pseudologin"]);
  $pass = test_input($_POST["pass"]);
  $confirm = test_input($_POST["confirm"]);

}

  ?>
     
        <?php
$sql = "SELECT * FROM members WHERE pseudologin = '$pseudo'";
$resultat = mysqli_query($con, $sql);

if($resultat->num_rows>=1)
{
  die ("pseudo already exists");
} else {

  
}
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


          <div class="login">
            <h2>Log-in</h2>
            <form id='login' action='login.php' method='post'>
            <fieldset>
              <label for='pseudo'>Pseudo*:</label>
              <input type='text' name='pseudologin' maxlength="50" />
              <label for='pass'>mot de pass</label>
              <input type='password' name='pass' maxlength="50" />
              <input type='reset' name='Save' value='Effacer' />
              <input type='submit' name='Save' value='Submit' />
              </fieldset>
            </form>
</body>
</html>