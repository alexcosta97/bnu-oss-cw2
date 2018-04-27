<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = $conn -> prepare('Select * from studentmodules sm, module m where m.modulecode = sm.modulecode and sm.studentid = ?');
      $sql -> execute(array($_SESSION['id']));

      // prepare page content
      $data['content'] .= "<div class='page-header'>";
      $data['content'] .= "<h1>My Modules</h1>";
      $data['content'] .= "</div>";
      $data['content'] .= "<table class='table table-hover table-condensed table-bordered'>";
      $data['content'] .= "<thead class='thead-light'>";
      $data['content'] .= "<tr><th>Code</th><th>Type</th><th>Level</th></tr>";
      $data['content'] .= "</thead>";
      $data['content'] .= "<tbody>";
      // Display the modules within the html table
      while($row = $sql -> fetch()) {
         $data['content'] .= "<tr><td> $row[modulecode] </td><td> $row[name] </td>";
         $data['content'] .= "<td> $row[level] </td></tr>";
      }
      $sql -> closeCursor();
      $data['content'] .= "</tbody>";
      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
