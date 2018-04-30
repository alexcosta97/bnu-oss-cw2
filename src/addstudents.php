<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //Define variables for entered values as empty
  $studentid = $password = $firstname = $lastname = $house = $town = $county = $country = $postcode = "";
  $dob = date_create();

  //check if logged in
  if(isset($_SESSION['id']) && !($_SERVER["REQUEST_METHOD"]=="POST"))
  {
    //generate form
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");
    echo template("templates/addstudent.php");
  }
  else if(isset($_SESSION['id']) && $_SERVER["REQUEST_METHOD"] == "POST")
  {
    //Verifies that all the data has been entered and assigns the entered information into variables
    if(empty($_POST['studentid']))
    {
      $data['validation']['studentid'] = true;
    }
    else{
      $studentid = $_POST['studentid'];
    }

    if(empty($_POST['password']))
    {
      $data['validation']['password'] = true;
    }
    else
    {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if(empty($_POST['dob']))
    {
      $data['validation']['dob'] = true;
    }
    else{
      $dob = $_POST['dob'];
    }

    if(empty($_POST['firstname']))
    {
      $data['validation']['firstname'] = true;
    }
    else
    {
      $firstname = $_POST['firstname'];
    }

    if(empty($_POST['lastname']))
    {
      $data['validation']['lastname'] = true;
    }
    else{
      $lastname = $_POST['lastname'];
    }

    if(empty($_POST['house']))
    {
      $data['validation']['house'] = true;
    }
    else{
      $house = $_POST['house'];
    }

    if(empty($_POST['town']))
    {
      $data['validation']['town'] = true;
    }
    else{
      $town = $_POST['town'];
    }

    if(empty($_POST['county']))
    {
      $data['validation']['county'] = true;
    }
    else
    {
      $county = $_POST['county'];
    }

    if(empty($_POST['country']))
    {
      $data['validation']['country'] = true;
    }
    else
    {
      $country = $_POST['country'];
    }

    if(empty($_POST['postcode']))
    {
      $data['validation']['postcode'] = true;
    }
    else
    {
      $postcode = $_POST['postcode'];
    }

    //if any error message has been added to $data['content'] prints the form again with the error messages
    if(!empty($data['validation']))
    {
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
      echo template("templates/addstudent.php", $data);
    }
    //if all the data is present, moves on to add the data to the database
    else{
      $sql = $conn -> prepare('INSERT INTO student(studentid, `password`, dob, firstname, lastname, house, town, county, country, postcode) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $result = $sql -> execute(
        array(
          $studentid,
          $password,
          $dob,
          $firstname,
          $lastname,
          $house,
          $town,
          $county,
          $country,
          $postcode
        )
        );

      //if the transaction has succeeded then send the user back to the students page
      if($result)
      {
        header("Location: students.php");
      }
    }
  }
  else
  {
    header("Location: index.php");
  }
?>
