<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id'])){

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    //Build SQL statement that selects students
    $result = $conn -> query("SELECT * FROM student");

    //prepare page content
    $data['content'] .= "<form action=
    'delete.php' method='post'>";
    $data['content'] .= "<div class='page-header'>";
    $data['content'] .= "<h1>Students</h1>";
    $data['content'] .= "</div>";
    $data['content'] .=
    "<table class='table table-hover table-condensed table-bordered'>";
    $data['content'] .= "<thead class='thead-light'>";
    $data['content'] .= "<tr><th>Student ID</th>";
    $data['content'] .= "<th>DOB</th><th>First Name</th>";
    $data['content'] .= "<th>Last Name</th>";
    $data['content'] .= "<th>House</th><th>Town</th>";
    $data['content'] .= "<th>County</th><th>Country</th>";
    $data['content'] .= "<th>Postcode</th><th>Selected</th>";
    $data['content'] .= "</tr></thead><tbody>";

    while($row = $result -> fetch()) {
      $data['content'] .= "<tr><td>$row[studentid]</td>";
      $data['content'] .= "<td>$row[dob]</td>";
      $data['content'] .= "<td>$row[firstname]</td>";
      $data['content'] .= "<td>$row[lastname]</td>";
      $data['content'] .= "<td>$row[house]</td>";
      $data['content'] .= "<td>$row[town]</td>";
      $data['content'] .= "<td>$row[county]</td>";
      $data['content'] .= "<td>$row[country]</td>";
      $data['content'] .= "<td>$row[postcode]</td>";
      $data['content'] .= "<td>";
      $data['content'] .= "<div class='form-check'>";
      $data['content'] .= "<input type='checkbox'";
      $data['content'] .= "class='form-check-input";
      $data['content'] .= "position-static' name='selected[]'";
      $data['content'] .= "value='$row[studentid]'/>";
      $data['content'] .= "</div></td></tr>";
    }
    $result -> closeCursor();
    $data['content'] .= "</tbody></table>";
    $data['content'] .= "<br/>";
    $data['content'] .= "<div class='form-group'>";
    $data['content'] .= "<a href='addstudents.php' class='btn";
    $data['content'] .= "btn-primary btn-md mr-2'";
    $data['content'] .= "role='button'>Add Student</a>";
    $data['content'] .= "<input class='btn btn-danger btn-md'";
    $data['content'] .= "type='submit' value='Delete'/>";
    $data['content'] .= "</form>";
    $data['content'] .= "</div>";
    //render the template
    echo template("templates/default.php", $data);
  }
  else{
    header("Location: index.php");
  }

  echo template("templates/partials/footer.php");
  ?>
