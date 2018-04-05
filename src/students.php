<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id'])){

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    //Build SQL statement that selects students
    $sql = "select * from students";

    $result = mysql_query($conn, $sql);

    //prepare page content
    $sata['content'] .= "<table border='1'>";
    $data['content'] .= "<tr><th cols";
    $data['content'] .= "<tr><th>Student ID</th><th>DOB</th><th>First Name</th><th>Last Name</th><th>House</th><th>Town</th><th>County</th"

  }
  else{
    header("Location: index.php");
  }
?>
