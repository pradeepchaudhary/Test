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
    $next='admin_data_page.php';
?>
<?php 
    $file_name=NULL;
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
    <!--page specific instructions.-->
    <fieldset>
    <legend>Instructions</legend>
    <ul type="square">
        <li> Click browse and select the document to upload.</li>
        <li> Clicking upload will upload the file and Document will be displayed in the browser If pdf plugin is installed, else a link for download will be displayed.</li>
    </ul>
    </fieldset>
</nav>
<section>
    <div id="form_div" style="position: fixed; bottom: 0%;">
        <form action="<?php $file_name=upload_doc();?>" method="post" enctype="multipart/form-data">
            <input type="file" name="myFile" accept="application/pdf" src="<?php if($file_name){echo $file_name;}?>" value="<?php if($file_name){echo $file_name;}?>">
            <input type="submit" value="Upload">
            <?php if($file_name){
                echo "Your file <strong>".$file_name."</strong> is uploaded.";                
            } ?>
<!--            <input type="file" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">-->
        </form>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    </div>
    <div 
        <?php
        if(!$file_name){
            echo "class=\"hidden\"";
        }
        ?>
        style="height:95%;">
        <object data="docs/<?php echo $file_name?>" type="application/pdf" width="100%" height="100%">
        <p> It appears you don't have a plugin installed to handle selected file type for this browser.
            You can <a href="docs/<?php echo $file_name?>">click here to download the PDF file.</a></p>
        </object>
    </div>
</section>
<?php mysqli_free_result($result); ?>
<?php include("../php_includes/layout/footer.php"); ?>
