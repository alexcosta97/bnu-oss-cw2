<?php
	//  Build PDO connection to database and display any errors
  //with the connection
  try{
    $conn = new PDO('mysql:host=localhost;dbname=oss-cw2;
    charset=utf8mb4', 'root', 'randomPass', array
    (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
   catch(Exception $error)
   {
     die('Error: ' . $error->getMessage());
   }
?>
