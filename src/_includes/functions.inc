<?php

/**
 * Validate Login function
 *
 * @param $id        - user ID
 * @param $password  - plaintext password
 * @return boolean   - returns true or false depending on successful authentication of user.
 */
function validatelogin($id,$password) {
   global $conn;
   // Build an SQL statment that will return a record with a matching id
   $sql = "select * from student where studentid='$id';";
	//echo $sql;
   $loginresult = mysqli_query($conn, $sql);
   $studentdetails = mysqli_fetch_assoc($loginresult);
	//print_r($studentdetails);

	// use PHP's verify_password function to check whether the stored
	// hash matches the given password
	if (password_verify($password, $studentdetails['password'])) {
		$_SESSION['id'] = $id;
		return true;
	}
	else {
		$_SESSION['id'] = '';
		return false;
	}
}


/**
 * Simple Templating function
 *
 * @param $file   - Path to the PHP file that acts as a template.
 * @param $args   - (optional) Associative array of variables to pass to the template file.
 * @return string - Output of the template file. Likely HTML.
 *
 * Source: http://www.daggerhart.com/create-simple-php-templating-function/
 */
function template( $file, $args=array() ){
   // ensure the file exists
   if ( !file_exists( $file ) ) {
      return '';
   }

   // Make values in the associative array easier to access by extracting them
   if ( is_array( $args ) ){
      extract( $args );
   }

   // buffer the output (including the file is "output")
   ob_start();
   include $file;
   return ob_get_clean();
}

function generateAddStudentsForm($studentid='', $studentidErr='', $password='', $passwordErr='', $dob=NULL, $dobErr='', $firstname='', $firstnameErr='', $lastname='', $lastnameErr='', $house='', $houseErr='', $town='', $townErr='', $county='', $countyErr='', $country='', $countryErr='', $postcode='', $postcodeErr='')
{
  include("config.inc");

  //prepare page contents
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");
    $data['content'] .= "<form action'addstudents.php' method='post'>";
    $data['content'] .= "<label for='studentid'>Student ID</label>";
    $data['content'] .= "<input type='text' id='studentid' name='studentid' value='" . htmlspecialchars($studentid) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$studentidErr</span>";
    $data['content'] .= "<label for='password'>Password</label>";
    $data['content'] .= "<input type='password' id='password' name='password' value='" . htmlspecialchars($password) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$passwordErr</span>";
    $data['content'] .= "<label for='dob'>Date Of Birth</label>";
    $data['content'] .= "<input type='date' id='dob' name='dob'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$dobErr</span>";
    $data['content'] .= "<label for='firstname'>First Name</label>";
    $data['content'] .= "<input type='text' id='firstname' name='firstname' value='" . htmlspecialchars($firstname) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$firstnameErr</span>";
    $data['content'] .= "<label for='lastname'>Last Name</label>";
    $data['content'] .= "<input type='text' id='lastname' name='lastname' value='" . htmlspecialchars($lastname) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$lastnameErr</span>";
    $data['content'] .= "<label for='house'>House</label>";
    $data['content'] .= "<input type='text' id='house' name='house' value='" . htmlspecialchars($house) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$houseErr</span>";
    $data['content'] .= "<label for='town'>Town</label>";
    $data['content'] .= "<input type='text' id='town' name='town' value='" . htmlspecialchars($town) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$townErr</span>";
    $data['content'] .= "<label for='county'>County</label>";
    $data['content'] .= "<input type='text' id='county' name='county' value='" . htmlspecialchars($county) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$countyErr</span>";
    $data['content'] .= "<label for='country'>Country</label>";
    $data['content'] .= "<input type='text' id='country' name='country' value='" . htmlspecialchars($country) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$countryErr</span>";
    $data['content'] .= "<label for='postcode'>Postcode</label>";
    $data['content'] .= "<input type='text' id='postcode' name='postcode' value='" . htmlspecialchars($postcode) . "'/><br/>";
    $data['content'] .= "<span style='color: #FF0000'>$postcodeErr</span>";
    $data['content'] .= "<input type='submit' value='Save'/>";
    $data['content'] .= "</form>";

    //Render the template
    echo template("templates/default.php", $data);
}

?>
