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
$previous='location_map.php';
$prefilled_form_action = $_SERVER['PHP_SELF'];
$curruserid = current_userid();
//mysqli_select_db($db, DB_NAME);
$query_Recordset1 = "SELECT firstName, lastName, birthdate, age, contact_details.email, contact_details.mobile, contact_details.telephone, image_file_details.photoFile, image_file_details.signFile "
                  . "FROM userdetails_test, contact_details, image_file_details "
                  . "WHERE contact_details.userid=$curruserid AND userdetails_test.userid=$curruserid AND image_file_details.userid=$curruserid";
$Recordset1 = mysqli_query($db, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>


<?php include("../php_includes/layout/header.php");?>
<nav>
<?php include ("../php_includes/layout/navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <form action="<?php echo $prefilled_form_action; ?>" method="post" enctype="multipart/form-data" name="form1">
        <!--<fieldset>-->
        <legend><strong>Confirm Details</strong></legend>
            <p>
            <label for="firstname">First Name</label>
            <input name="firstname" type="text" id="firstname" value="<?php echo $row_Recordset1['firstName']; ?>">
            <a href="photo_upload.php"><img id="photo" src='<?php echo $row_Recordset1['photoFile']; ?>' class="photo"/></a>
            </p>
          <p>
            <label for="lastname">Last Name</label>
            <input name="lastname" type="text" id="lastname" value="<?php echo $row_Recordset1['lastName']; ?>">
            <a href="signature_upload.php"><img id="sign" src='<?php echo $row_Recordset1['signFile']; ?>' class="sign"/></a>
            </p>
          <p>
            <label for="dob">Date of Birth</label>
            <input name="dob" type="date" id="dob" value="<?php echo $row_Recordset1['birthdate']; ?>">
          </p>
          <p>
            <label for="age">Age</label>
            <input name="age" type="text" id="age" value="<?php echo $row_Recordset1['age']; ?>">
          </p>
<!--          <p>
              <img id="photo" src='<?php echo $row_Recordset1['photoFile']; ?>' class="photo"/>
          </p>
          <p>
              <img id="sign" src='<?php echo $row_Recordset1['signFile']; ?>' class="sign"/>
          </p>-->
        <!--</fieldset>-->
<!--        <fieldset>
                <legend><strong>Photograph &amp; Signature</strong></legend>
            <p>
                <label for="piclocation">Select the file for Photograph</label>
                <input type="file" name="piclocation" id="piclocation" style="width:auto"><input type="button" name="upload" onClick="uploadPhoto()" value="Upload" />
                <script type="text/javascript">
                                function uploadPhoto(){
                                var picaddress = document.getElementById('piclocation').Value;
                                alert(picaddress);
                                }
                        </script>
            </p>
            <p>
              <label for="siglocation">Select the file for Signature</label>
              <input type="file" name="siglocation" id="siglocation" style="width:auto"><input type="button" name="upload" onClick="uploadSign" value="Upload" />
            </p>
        </fieldset>-->
<!--        <fieldset>
          <legend><strong>Contact details</strong></legend>	-->
          <p>
            <label for="email">Email</label>
            <input name="email" type="text" id="email" value="<?php echo $row_Recordset1['email']; ?>">
          </p>
          <p>
            <label for="mobile">Mobile no.</label>
            <input name="mobile" type="text" id="mobile" value="<?php echo $row_Recordset1['mobile']; ?>">
          </p>
          <p>
            <label for="telephone">Telephone no.</label>
            <input name="telephone" type="text" id="telephone" value="<?php echo $row_Recordset1['telephone']; ?>">
          </p>
        <!--</fieldset>-->
        <functions>
        <!--<input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">-->        
        <input type="submit" name="submit" id="submit" value="Save & Exit">
        <input name="editbtn" type="button" id="editbtn" onClick = "window.location.href='new_user_form.php'" value="Edit details">
        </functions>
        </form>
    </div>
</section>
<?php include("../php_includes/layout/footer.php"); ?>
