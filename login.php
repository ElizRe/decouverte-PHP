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

          <div class="login">
            <h2>Log-in</h2>
            <form id='login' action='login.php' method='post'>
              <fieldset>
                <label for='pseudo'>Pseudo:</label>
                <input type='text' name='pseudo' maxlength="50" />
                <label for='pass'>mot de pass</label>
                <input type='password' name='pass' maxlength="50" />
                <input type='reset' name='Reset' value='Effacer' />
                <input type='submit' name='Save' value='Submit' />
              </fieldset>
            </form>
          </div>
  <?php
  include_once('menu.php');
  include_once('cnxn.php');
  ?>
  <?php
// define variables and set to empty values
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $pseudo = test_input($_POST["pseudo"]);
//   $pass = test_input($_POST["pass"]);
// }
    // Vérifier que le pseudo et password ont été renseigné par l'utilisateur
    if ( isset( $_POST[ 'pseudo' ] ) && isset( $_POST[ 'pass' ] ) ) {
      $pseudo = $_POST[ 'pseudo' ];
      $pass = $_POST[ 'pass' ];
      
      // Récupération de l'utilisateur correspondant au pseudo
      $sql = "SELECT * FROM members WHERE pseudo = '$pseudo'";
      $resultat = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($resultat);

      // Vérification que le pseudo existe en base
      if(($resultat->num_rows > 0)){ 
        // Vérification que le mot de passe est correct
        if (password_verify($pass,$row['pass'])){
           echo "login successful";
// start up your PHP session 
    session_start();
    if(isset($_SESSION['views']))
    $_SESSION['id'] = $row['id']+ 1;
    $_SESSION['pseudo'] = $row['pseudo']+ 1;
    $_SESSION['views'] = 1;
          echo "views = ". $_SESSION['views']; 
          header("Location: index.php");
          
        } else 
        {
          echo "Unknown user or Wrong Password"; 
        die();
        }
      }
    }
     
?>
</body>
</html>