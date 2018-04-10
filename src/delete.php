<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  if(isset($_SESSION['id']))
  {
    //Building the query depending on the selected records
    if(!empty($_POST['selected']))
    {
      $sql = "Delete from students where";
      $lastElement = end($_POST['selected']);
      foreach($_POST['selected'] as $selected)
      {
        if($selected != $lastElement)
        {
          $sql .= " id=$selected AND";
        }
        else
        {
          $sql .= " id=$selected;";
        }
      }
    }

    mysqli_query($conn, $sql);
    header("Location: students.php");
  }
?>
