<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  if(isset($_SESSION['id']))
  {
    $select = $_POST['selected'];
    //Building the query depending on the selected records
    if(!empty($select))
    {
      $lastElement = end($select);
      $sql = "Delete from student where ";
      foreach($select as $stu)
      {
        if(strcmp($stu, $lastElement) != 0)
        {
          $sql .= " studentid=$stu AND ";
        }
        else
        {
          $sql .= " studentid=$stu ;";
        }
      }
      $result = mysqli_query($conn, $sql);
      if($result)
      {
        header("Location: students.php");
      }
      else
      {
        printf("Error: %s\n", mysqli_error($conn));#
        printf($sql);
        exit();
      }
    }
    else
    {
      header("Location: students.php");
    }
  }
  else
  {
    header("Location: index.php");
  }
?>
