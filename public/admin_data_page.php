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
    $previous='admin_exam_upload.php';
    $next='support.php';
    $adpage_form_action=$_SERVER['PHP_SELF'];
?>
<?php 
    //check the display condition
    if(isset($_POST['display_type'])){
        $display_type=$_POST['display_type'];
        $_SESSION['display_type']=$_POST['display_type'];
        if($display_type=="all"){
            // Perform database query
            $query = "SELECT * "
                   . "FROM userdetails_test";
        }else if($display_type=="conditional"){
            $query = "SELECT * "
                   . "FROM userdetails_test";
        }
    }else{
        $query = "SELECT * "
               . "FROM userdetails_test";
    }
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
        <form action="<?php echo $adpage_form_action; ?>" method="post" name="admin_data_page">
            <label for="display_type"><strong>Display</strong></label>
            <input name="display_type" type="radio" id="display_type" value="all" <?php if(isset($_POST['display_type']) && ($_SESSION['display_type']=="all")){echo "checked";}?>><label for="display_type">all</label>
            <input name="display_type" type="radio" id="display_type" value="conditional" <?php if(isset($_POST['display_type']) && ($_SESSION['display_type']=="conditional")){echo "checked";}?>><label for="display_type">conditional</label>
            <p><label for="select"><strong>SELECT</strong></label>
                <input name="select[]" type="checkbox" id="select" value="field1"><label for="select">field1</label>
                <input name="select[]" type="checkbox" id="select" value="field2"><label for="select">field2</label>
                <input name="select[]" type="checkbox" id="select" value="field3"><label for="select">field3</label>
                <label for="where"><strong>WHERE</strong></label>
                <select name="where" id="where">
                    <option value ="field1">field1</option>
                    <option value ="field2">field2</option>
                </select>
                =
                <select name="where" id="where">
                    <option value ="field1">field1</option>
                    <option value ="field2">field2</option>
                </select>
            </p>
            <p><label for="sort_by">Sort by</label>
                <select name="sort_by" id="sort_by">
                    <option value="field1">field1</option>
                    <option value="field2">field2</option>
                    <option value="field3">field3</option>
                    <option value="field4">field4</option>
                    <option value="field5">field5</option>
                    <option value="field1">field1</option>
                    <option value="field2">field2</option>
                    <option value="field3">field3</option>
                    <option value="field4">field4</option>
                    <option value="field5">field5</option>
                </select>
                <select name="sort_by" id="sort_by">
                    <option value="field1">field1</option>
                    <option value="field2">field2</option>
                    <option value="field3">field3</option>
                    <option value="field4">field4</option>
                    <option value="field5">field5</option>
                    <option value="field1">field1</option>
                    <option value="field2">field2</option>
                    <option value="field3">field3</option>
                    <option value="field4">field4</option>
                    <option value="field5">field5</option>
                </select>
                <input type="submit" name="execute_query" id="execute_query" value="Execute Query">
            </p>
        </form>
        <?php
        //display data in tabular format
        if(isset($_POST['display_type'])){
            echo "<table cellpadding=2 border=0>";
            echo "<tr class=\"head_line\"><td>First Name</td><td>Last Name</td><td>Date of Birth</td><td>Age</td></tr>";
    //        echo "<tr class=\"head_line\"><td>First Name</td><td>Last Name</td><td>Date of Birth</td><td>Age</td><td>First Name</td><td>Last Name</td><td>Date of Birth</td><td>Age</td><td>First Name</td><td>Last Name</td><td>Date of Birth</td><td>Age</td><td>First Name</td><td>Last Name</td><td>Date of Birth</td><td>Age</td></tr>";
            while($row = mysqli_fetch_row($result)) { 
                echo "<tr>"; 
                echo "<td>"." ".$row[2]."</td>";
                echo "<td>"." ".$row[3]."</td>";
                echo "<td>"." ".$row[4]."</td>";
                echo "<td>"." ".$row[5]."</td>";
    //            echo "<td>"." ".$row[2]."</td>";
    //            echo "<td>"." ".$row[3]."</td>";
    //            echo "<td>"." ".$row[4]."</td>";
    //            echo "<td>"." ".$row[5]."</td>";
    //            echo "<td>"." ".$row[2]."</td>";
    //            echo "<td>"." ".$row[3]."</td>";
    //            echo "<td>"." ".$row[4]."</td>";
    //            echo "<td>"." ".$row[5]."</td>";
    //            echo "<td>"." ".$row[2]."</td>";
    //            echo "<td>"." ".$row[3]."</td>";
    //            echo "<td>"." ".$row[4]."</td>";
    //            echo "<td>"." ".$row[5]."</td>";            
                echo "</tr>"; 
            } 
            echo "</table>";
        }
        ?>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    </div>
</section>
<?php 
    $_POST['display_type']=NULL;
    $_SESSION['display_type']=NULL;
    mysqli_free_result($result); 
?>
<?php include("../php_includes/layout/footer.php"); ?>
