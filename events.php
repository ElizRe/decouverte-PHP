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
  // Vérification que nous sommes bien authentifié
  // Si nous sommes pas authentifié rediriger vers la page de connexion.
  // ...

  include_once 'menu.php';
  include_once('cnxn.php');
  ?>
  <div class="contents">
  <h1>Events</h1>
