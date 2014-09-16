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

//Populate the form with already available data
$query = "SELECT firstName, lastName, birthdate, age, contact_details.email, contact_details.mobile, contact_details.telephone, image_file_details.photoFile, image_file_details.signFile "
       . "FROM userdetails_test, contact_details, image_file_details "
       . "WHERE contact_details.userid=$curruserid AND userdetails_test.userid=$curruserid AND image_file_details.userid=$curruserid";
$result = mysqli_query($db, $query) or die(mysql_error());
$rows = mysqli_fetch_assoc($result);
if(!$rows){
    
}

///write code to check if current user already exists.

//***inserting details for new user

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insert_query = sprintf("INSERT INTO userdetails_test (userID, firstName, lastName, birthdate, age) "
                . "VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($curruserid, "int"),
                GetSQLValueString($_POST['firstname'], "text"),
                GetSQLValueString($_POST['lastname'], "text"),
                GetSQLValueString($_POST['dob'], "date"),
                GetSQLValueString($_POST['age'], "int"),
                "ON DUPLICATE KEY UPDATE VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($curruserid, "int"),
                GetSQLValueString($_POST['firstname'], "text"),
                GetSQLValueString($_POST['lastname'], "text"),
                GetSQLValueString($_POST['dob'], "date"),
                GetSQLValueString($_POST['age'], "int")
                );
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

<?php include("../php_includes/layout/header.php");?>
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
                <input type="text" name="firstname" id="firstname" value="<?php echo $rows['firstName']; ?>">
                </p>
                <p>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $rows['lastName']; ?>">
                </p>
                <p>
                <label for="dateofbirth">Date of Birth</label>
                <input name="dob" type="date" id="dob" value="<?php echo $rows['birthdate']; ?>" onBlur="calculateAge()">
                </p>
                <p>
                <label for="age">Age</label>
                <input name="age" type="text" id="age" value="<?php echo $rows['age']; ?>" onClick="calculateAge()">
                </p>
            <!--</fieldset>-->

<!--                <fieldset>-->
                <legend><strong>Contact details</strong></legend>	
                <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $rows['email']; ?>">
                </p>
                <p>
                <label for="mobile">Mobile no.</label>
                <input type="text" name="mobile" id="mobile" value="<?php echo $rows['mobile']; ?>">
                </p>
                <p>
                <label for="telephone">Telephone no.</label>
                <input type="text" name="telephone" id="telephone" value="<?php echo $rows['telephone']; ?>">
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
