<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      // build an sql statment to update the student details
      $sql = 'UPDATE student SET firstname = ?, lastname = ?,
      house = ?, town = ?, county = ?, country = ?, postcode = ?
      WHERE studentid = ?';
      $query = $conn -> prepare($sql);
      $result = $query -> execute(array(
        $_POST['txtfirstname'],
        $_POST['txtlastname'],
        $_POST['txthouse'],
        $_POST['txttown'],
        $_POST['txtcounty'],
        $_POST['txtcountry'],
        $_POST['txtpostcode'],
        $_SESSION['id']
      ));

      if($result)
      {
        $data['content'] .= '<p>Your details have been
        updated.</p>';
      }

   }
   else {
      // Build a SQL statment to return the student record with
      //the id that
      // matches that of the session variable.
      $sql = 'SELECT * from student where studentid=? ;';
      $query = $conn -> prepare($sql);
      $query -> execute(array($_SESSION['id']));
      $row = $query -> fetch();
      $query -> closeCursor();

      // using <<<EOD notation to allow building of a multi-line
      //string
      // see
      //http://stackoverflow.
      //com/questions/6924193/what-is-the-use-of-eod-in-php for
      //info
      // also
      //http://stackoverflow.
      //com/questions/8280360/formatting-an-array-value-inside-a-
      //heredoc
      $data['content'] = <<<EOD

   <h1>My Details</h2>
   <form name="frmdetails" action="" method="post">
   <div class="form-row">
    <div class="form-group col-6">
      <label for="txtfirstname">First Name</label>
      <input name="txtfirstname" class="form-control"
      type="text" value="{$row['firstname']}" />
    </div>
    <div class="form-group col-6">
      <label for="txtlastname">Surname</label>
      <input name="txtlastname" type="text" class="form-control"
      value="{$row['lastname']}" />
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="txthouse">Number and Street</label>
      <input name="txthouse" type="text" class="form-control"
      value="{$row['house']}" />
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="txttown">Town</label>
      <input name="txttown" type="text" class="form-control"
      value="{$row['town']}" />
    </div>
    <div class="form-group col-4">
      <label for="txtcounty">County</label>
      <input name="txtcounty" type="text" class="form-control"
      value="{$row['county']}" />
    </div>
    <div class="form-group col-2">

    <label for="txtpostcode">Postcode</label>
      <input name="txtpostcode" type="text" class="form-control"
      value="{$row['postcode']}" />
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="txtcountry">Country</label>
      <input name="txtcountry" type="text" class="form-control"
      value="{$row['country']}" />
    </div>
  </div>
   <input type="submit" value="Save" class="btn btn-primary
   btn-md" name="submit"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
