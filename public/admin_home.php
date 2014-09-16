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
//declaring the navigation variables
    $previous='support.php';
    $next='admin_exam_upload.php';
    $save='support.php';
    $admin_home_form_action=$_SERVER['PHP_SELF'];
?>
<?php 
    // Perform database query
    $query = "SELECT * "
           . "FROM userdetails_test";
    $result=  mysqli_query($db, $query);
    //check for query error
    if(!$result){
        die("Database query failed.");
    }
?>


<?php include("../php_includes/layout/header.php");?>
<nav>
<?php include ("../php_includes/layout/admin_navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <form action="<?php echo $admin_home_form_action; ?>" method ="POST" name="admin_home_form">
            <strong>Admin Information</strong>
            <p><label for="admin_name">Name</label>
                <input name="admin_name" type="text" id="admin_name"></p>
            <p><label for="admin_mail">Email</label>
                <input name="admin_mail" type="email" id="admin_mail"></p>
            <p><label for="admin_phone">Phone Number</label>
                <input name="admin_phone" type="text" id="admin_phone"></p>
            <strong>Change Password</strong>
            <p><label for="admin_current_pass">Current password</label>
                <input name="admin_current_pass" type="password" id="admin_current_pass"></p>
            <p><label for="admin_new_pass">New password</label>
                <input name="admin_new_pass" type="password" id="admin_new_pass"></p>
            <p><label for="admin_confirm_new_pass">Confirm password</label>
                <input name="admin_confirm_new_pass" type="password" id="admin_confirm_new_pass"></p>
        </form>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
            <input name="save" type="button" id="save" onClick="window.location.href='<?php echo $save; ?>'" value="Save">
        </functions>
    </div>
</section>
<?php mysqli_free_result($result); ?>
<?php include("../php_includes/layout/footer.php"); ?>
