<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<!--
This code is generated under the Project PC1 version2.
-->
<?php require_once '../php_includes/db_connection.php';?>
<?php require_once '../php_includes/functions.php';?>
<?php 
$new_user_form_action = $_SERVER['PHP_SELF'];
$insertGoTo = "photo_upload.php";
if (isset($_SERVER['QUERY_STRING'])) {
  $new_user_form_action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//detecting form submission
//if(isset($_POST['submit'])){
//    $firstname = $_POST['firstname'];
//}else{
//    $firstname = "";
//}
//$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";

//***Experimental code
$curruserid =  current_userid();        //getting the current userid.
//echo $curruserid;

///write code to check if current user already exists.

//***inserting details for new user

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insert_query = sprintf("INSERT INTO userdetails_test (userID, firstName, lastName, birthdate, age) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($curruserid, "int"),
                GetSQLValueString($_POST['firstname'], "text"),
                GetSQLValueString($_POST['lastname'], "text"),
                GetSQLValueString($_POST['dob'], "date"),
                GetSQLValueString($_POST['age'], "int"));
//  echo $insert_query;
  global $db;
  mysqli_select_db($db, DB_NAME);
//  var_dump ($db);
  $Result1 = mysqli_query($db, $insert_query) or die('Database insertion failed. Connect Error: ' .
		"(".$db->connect_errno.")");
//  $Result1 = mysqli_query($db, $insert_query) or die(mysql_error());
  
  $insert_query = sprintf("INSERT INTO contact_details (userid, email, mobile, telephone) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($curruserid,"int"),
                    GetSQLValueString($_POST['email'], "text"),
                    GetSQLValueString($_POST['mobile'], "int"),
                    GetSQLValueString($_POST['telephone'], "int"));
//  echo $insert_query;  
  
  $Result2 = mysqli_query($db, $insert_query) or die('Database insertion failed. Connect Error: ' .
		"(".$db->connect_errno.")");
  //(mysql_error());

  
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
header(sprintf("Location: %s", $insertGoTo));
}    

?>

<!-- page content-->
<?php include("../php_includes/layout/header.php"); ?>
<nav>
<?php include ("../php_includes/layout/navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <form action="<?php echo $new_user_form_action; ?>" method="POST" enctype="multipart/form-data" name="form1">
            <!--<fieldset>-->
                <legend><strong>Personal Details</strong></legend>
                <p>
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname">
                </p>
                <p>
                <label for="dateofbirth">Date of Birth</label>
                <input name="dob" type="date" id="dob" onBlur="calculateAge()">
                </p>
                <p>
                <label for="age">Age</label>
                <input name="age" type="text" id="age" onClick="calculateAge()">
                </p>
<!--            </fieldset>

            <fieldset>-->
                <legend><strong>Contact details</strong></legend>	
                <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                </p>
                <p>
                <label for="mobile">Mobile no.</label>
                <input type="text" name="mobile" id="mobile">
                </p>
                <p>
                <label for="telephone">Telephone no.</label>
                <input type="text" name="telephone" id="telephone">
                </p>
            <!--</fieldset>-->
            <functions>
                <input type="reset" name="reset" id="reset" value="Reset">
                <input type="submit" name="submit" id="submit" value="Submit">
                <!--<input name="mapbtn" type="button" id="mapbtn" onClick="window.location.href='location_map.php'" value="Location on Map">-->
                <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $insertGoTo; ?>'" value="Next >>">
                <input type="hidden" name="MM_insert" value="form1">
            </functions>
        </form>
    </div>
</section>
<?php include("../php_includes/layout/footer.php"); ?>
