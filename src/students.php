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
    $data['content'] .= "<table class='table table-hover table-condensed table-bordered table-responsive'>";
    $data['content'] .= "<thead><tr><th colspan='10' class='text-center'>Students</th></tr>";
    $data['content'] .= "<tr><th>Student ID</th><th>DOB</th><th>First Name</th><th>Last Name</th><th>House</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th><th>Selected</th></tr></thead><tbody>";

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $data['content'] .= "<tr><td>$row[studentid]</td><td>$row[dob]</td><td>$row[firstname]</td><td>$row[lastname]</td><td>$row[house]</td><td>$row[town]</td><td>$row[county]</td><td>$row[country]</td><td>$row[postcode]</td>";
      $data['content'] .= "<td><input type='checkbox' name='selected[]' value='$row[studentid]'/></td></tr>";
    }
    $data['content'] .= "</tbody></table>";
    $data['content'] .= "<br/>";
    $data['content'] .= "<div class='row'>";
    $data['content'] .= "<input class='btn' type='submit' value='Delete'/>";
    $data['content'] .= "</form>";
    $data['content'] .= "<a href='addstudents.php'>Add Student</a>";
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
