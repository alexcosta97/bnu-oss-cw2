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
      $data['content'] .= "Student ID missing<br/>";
    }
    else{
      $studentid = $_POST['studentid'];
    }

    if(empty($_POST['password']))
    {
      $data['content'] .= "Password missing<br/>";
      // $data['validation']['password'] =
    }
    else
    {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if(empty($_POST['dob']))
    {
      $data['content'] .= "Date Of Birth missing</br>";
    }
    else{
      $dob = $_POST['dob'];
    }

    if(empty($_POST['firstname']))
    {
      $data['content'] .= "First Name missing<br/>";
    }
    else
    {
      $firstname = $_POST['firstname'];
    }

    if(empty($_POST['lastname']))
    {
      $data['content'] .= "Last Name missing<br/>";
    }
    else{
      $lastname = $_POST['lastname'];
    }

    if(empty($_POST['house']))
    {
      $data['content'] .= "House missing <br/>";
    }
    else{
      $house = $_POST['house'];
    }

    if(empty($_POST['town']))
    {
      $data['content'] .= "Town missing<br/>";
    }
    else{
      $town = $_POST['town'];
    }

    if(empty($_POST['county']))
    {
      $data['content'] .= "County missing<br/>";
    }
    else
    {
      $county = $_POST['county'];
    }

    if(empty($_POST['country']))
    {
      $data['content'] .= "Country missing<br/>";
    }
    else
    {
      $country = $_POST['country'];
    }

    if(empty($_POST['postcode']))
    {
      $data['content'] .= "Postcode missing<br/>";
    }
    else
    {
      $postcode = $_POST['postcode'];
    }

    //if any error message has been added to $data['content'] prints the form again with the error messages
    if(!empty($data['content']))
    {
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
      echo template("templates/addstudent.php");
      echo template("templates/default.php", $data);
    }
    //if all the data is present, moves on to add the data to the database
    else{
      $sql = "Insert Into `student`(`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) Values('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode');";

      $result = mysqli_query($conn, $sql);

      //if the transaction has succeeded then send the user back to the students page
      if($result)
      {
        header("Location: students.php");
      }
      //otherwise print an error message
      else
      {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
    }
  }
  else
  {
    header("Location: index.php");
  }
?>
