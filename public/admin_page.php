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
<!--declaring the navigation variables-->
<?php 
    $previous='support.php';
    $next='support.php';
?>

<?php include("../php_includes/layout/header.php");?>
<nav>
<?php include ("../php_includes/layout/admin_navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    </div>
</section>
<?php include("../php_includes/layout/footer.php"); ?>
