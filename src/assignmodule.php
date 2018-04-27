<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // If a module has been selected
   if (isset($_POST['selmodule'])) {
      $sql = $conn -> prepare('INSERT INTO studentmodules values (?, ?)');
      $sql -> execute(array($_SESSION['id'], $_POST['selmodule']));
      $data['content'] .= "<p>The module " . $_POST['selmodule'] . " has been assigned to you</p>";
   }
   else  // If a module has not been selected
   {

     // Build sql statment that selects all the modules
     $sql = $conn -> query('SELECT * FROM module');

     $data['content'] .= "<h1>Assign Modules</h1>";
     $data['content'] .= "<form name='frmassignmodule' action='' class='mt-1' method='post' >";
     $data['content'] .= "<div class='form-row'>";
     $data['content'] .= "<div class='form-group col-6'";
     $data['content'] .= "<label for='selmodule'>Select a module to assign</label>";
     $data['content'] .= "<select name='selmodule' id='selmodule' class='form-control'>";
     // Display the module name sin a drop down selection box
     while($row = $sql -> fetch()) {
        $data['content'] .= "<option value='$row[modulecode]'>$row[name]</option>";
     }
     $sql -> closeCursor();
     $data['content'] .= "</select>";
     $data['content'].= "</div></div>";
     $data['content'] .= "<input type='submit' class='btn btn-primary btn-md' name='confirm' value='Save' />";
     $data['content'] .= "</form>";
   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
