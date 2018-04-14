<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //Define variables for missing values and entered values as empty
  $studentidErr = $passwordErr = $dobErr = $firstnameErr = $lastnameErr = $houseErr = $townErr = $countyErr = $countryErr = $postcodeErr = "";
  $studentid = $password = $firstname = $lastname = $house = $town = $county = $country = $postcode = "";
  $dob = date_create();

  //check if logged in
  if(isset($_SESSION['id']) && !($_SERVER["REQUEST_METHOD"]=="POST"))
  {
    //generate form
    generateAddStudentsForm();
  }
  else if(isset($_SESSION['id']) && $_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(empty($_POST['studentid']))
    {
      $studentidErr = "Student ID missing<br/>";
    }
    else{
      $studentid = $_POST['studentid'];
    }

    if(empty($_POST['password']))
    {
      $passwordErr = "Password missing<br/>";
    }
    else
    {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if(empty($_POST['dob']))
    {
      $dobErr = "Date Of Birth missing</br>";
    }
    else{
      $dob = $_POST['dob'];
    }

    if(empty($_POST['firstname']))
    {
      $firstnameErr = "First Name missing<br/>";
    }
    else
    {
      $firstname = $_POST['firstname'];
    }

    if(empty($_POST['lastname']))
    {
      $lastnameErr = "Last Name missing<br/>";
    }
    else{
      $lastname = $_POST['lastname'];
    }

    if(empty($_POST['house']))
    {
      $houseErr = "House missing <br/>";
    }
    else{
      $house = $_POST['house'];
    }

    if(empty($_POST['town']))
    {
      $townErr = "Town missing<br/>";
    }
    else{
      $town = $_POST['town'];
    }

    if(empty($_POST['county']))
    {
      $countyErr = "County missing<br/>";
    }
    else
    {
      $county = $_POST['county'];
    }

    if(empty($_POST['country']))
    {
      $countryErr = "Country missing<br/>";
    }
    else
    {
      $country = $_POST['country'];
    }

    if(empty($_POST['postcode']))
    {
      $postcodeErr = "Postcode missing<br/>";
    }
    else
    {
      $postcode = $_POST['postcode'];
    }

    if(!empty($studentidErr) || !empty($passwordErr) || !empty($dobErr) || !empty($firstnameErr) || !empty($lastnameErr) || !empty($houseErr) || !empty($townErr) || !empty($countyErr) || !empty($countryErr) || !empty($postcodeErr))
    {
      generateAddStudentsForm($studentidErr, $passwordErr, $dobErr, $firstnameErr, $lastnameErr, $houseErr, $townErr, $countyErr, $countryErr, $postcodeErr);
    }
  }
  else
  {
    header("Location: index.php");
  }
?>
