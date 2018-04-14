<?php
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id']))
  {
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");


  }
