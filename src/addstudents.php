<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id']) && !isset($_POST['studentid']))
  {
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    //prepare page contents
    $data['content'] .= "<form action'addstudents.php' method='post'>";
    $data['content'] .= "<label for='studentid'>Student ID</label>";
    $data['content'] .= "<input type='text' id='studentid' name='studentid'/><br/>";
    $data['content'] .= "<label for='password'>Password</label>";
    $data['content'] .= "<input type='password' id='password' name='password'/><br/>";
    $data['content'] .= "<label for='dob'>Date Of Birth</label>";
    $data['content'] .= "<input type='date' id='dob' name='dob'/><br/>";
    $data['content'] .= "<label for='firstname'>First Name</label>";
    $data['content'] .= "<input type='text' id='firstname' name='firstname'/><br/>";
    $data['content'] .= "<label for='lastname'>Last Name</label>";
    $data['content'] .= "<input type='text' id='lastname' name='lastname'/><br/>";
    $data['content'] .= "<label for='house'>House</label>";
    $data['content'] .= "<input type='text' id='house' name='house'/><br/>";
    $data['content'] .= "<label for='town'>Town</label>";
    $data['content'] .= "<input type='text' id='town' name='town'/><br/>";
    $data['content'] .= "<label for='county'>County</label>";
    $data['content'] .= "<input type='text' id='county' name='county'/><br/>";
    $data['content'] .= "<label for='country'>Country</label>";
    $data['content'] .= "<input type='text' id='country' name='country'/><br/>";
    $data['content'] .= "<label for='postcode'>Postcode</label>";
    $data['content'] .= "<input type='text' id='postcode' name='postcode'/><br/>";
    $data['content'] .= "<input type='submit' value='Save'/>";
    $data['content'] .= "</form>";

    //Render the template
    echo template("templates/default.php", $data);
  }
  else if(isset($_SESSION['id']))
  {
    header("Location:students.php");
  }
  else
  {
    header("Location: index.php");
  }
?>
