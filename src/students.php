<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id'])){

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    //Build SQL statement that selects students
    $sql = "select * from student;";

    $result = mysqli_query($conn,$sql);

    if (!$result) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
  }

    //prepare page content
    $data['content'] .= "<form action=
    'delete.php' method='post'>";
    $data['content'] .= "<div class='page-header'>";
    $data['content'] .= "<h1>Students</h1>";
    $data['content'] .= "</div>";
    $data['content'] .= "<table class='table table-hover table-condensed table-bordered'>";
    $data['content'] .= "<thead class='thead-light'><tr><th>Student ID</th><th>DOB</th><th>First Name</th><th>Last Name</th><th>House</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th><th>Selected</th></tr></thead><tbody>";

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $data['content'] .= "<tr><td>$row[studentid]</td><td>$row[dob]</td><td>$row[firstname]</td><td>$row[lastname]</td><td>$row[house]</td><td>$row[town]</td><td>$row[county]</td><td>$row[country]</td><td>$row[postcode]</td>";
      $data['content'] .= "<td>";
      $data['content'] .= "<div class='form-check'>";
      $data['content'] .= "<input type='checkbox' class='form-check-input position-static' name='selected[]' value='$row[studentid]'/>";
      $data['content'] .= "</div></td></tr>";
    }
    $data['content'] .= "</tbody></table>";
    $data['content'] .= "<br/>";
    $data['content'] .= "<div class='row'>";
    $data['content'] .= "<a href='addstudents.php' class='btn btn-primary btn-md mr-2' role='button'>Add Student</a>";
    $data['content'] .= "<input class='btn btn-danger btn-md' type='submit' value='Delete'/>";
    $data['content'] .= "</form>";
    $data['content'] .= "</div>";
    mysqli_free_result($result);
    //render the template
    echo template("templates/default.php", $data);
  }
  else{
    header("Location: index.php");
  }

  echo template("templates/partials/footer.php");
  ?>
