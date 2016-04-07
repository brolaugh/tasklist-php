<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/13/16
 * Time: 3:56 AM
 */

include_once("Helper.php");

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" charset="utf-8">
  <meta charset="utf-8">
  <title>TaskList</title>
  <script src="js/master.js" charset="utf-8"></script>
</head>
<body>

<main class="container-fluid">
  <header>
    <div class="jumbotron"><h1 class="text-lg-center text-md-center">TaskList</h1></div>
  </header>
  <?php

  if(isset($_REQUEST['page'])){
    $regex = '/[^A-Za-z0-9\-_\/]/';
    $_REQUEST['page'] = preg_replace($regex, '', $_GET['page']);

    if (file_exists('App/pages/' . $_GET['page'] . '.php'))
      include 'App/pages/' . $_GET['page'] . '.php';
    else
      include 'App/pages/404.php';
  }
  ?>
</main>
<footer>
  <script src="js/jquery.min.js" charset="utf-8"></script>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="js/material.min.js" charset="utf-8"></script>
  <script src="js/ripples.min.js" charset="utf-8"></script>
</footer>
</body>
</html>
