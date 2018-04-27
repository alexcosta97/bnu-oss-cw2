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
          $sql .= " studentid=? AND ";
        }
        else
        {
          $sql .= " studentid=$? ;";
        }
      }
      $query = $conn -> prepare($sql);
      $result = $query -> execute($select);
      if($result)
      {
        header("Location: students.php");
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
