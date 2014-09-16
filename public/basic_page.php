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
    $next='support.php';
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
<?php include ("../php_includes/layout/navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <?php
        //display the fetched data
        while($row=  mysqli_fetch_row($result)){
            //output data from each row
            echo $row[2]." ";
            echo $row[3]." ";
            echo $row[4]." ";
            echo $row[5]." ";
            echo "<hr />";
        }
        ?>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    </div>
</section>
<?php mysqli_free_result($result); ?>
<?php include("../php_includes/layout/footer.php"); ?>
