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
    $previous='new_user_form.php';
    $next='signature_upload.php';
?>

<?php include ("../php_includes/layout/header.php");?>

<link href="stylesheets/Imageform_style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />

<script src="javascripts/jquery.min.js"></script>
<script src="javascripts/jquery.Jcrop.min.js"></script>
<script src="javascripts/script.js"></script>

<nav>
<?php include ("../php_includes/layout/navigation.php");?>
    <fieldset>
    <legend>Instructions</legend>
    <ul type="square">
        <li> Click browse and select the image to upload/crop.</li>
        <div class="step2">
        <li> Crop region details are provided on the upper right corner of image.</li>
        <li> Click on upload button to save the cropped region.</li>
        </div>
    </ul>
    </fieldset>
</nav>
<section>
    <div id="form_div">
    <!--<fieldset>-->
    <legend><strong>Photograph</strong></legend>
        <!-- upload form -->
        <form id="upload_form" enctype="multipart/form-data" method="post" onsubmit="return checkForm()">
            <!-- hidden crop params -->
            <input type="hidden" id="x1" name="x1" />
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="x2" name="x2" />
            <input type="hidden" id="y2" name="y2" />
            Step1: Please select image file
            <input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" accept="image/*" />
            <div class="error"></div> 
            <div class="step2"> 
                <p style="">Step2: Please select a crop region </p>
                <div><img id="preview"/></div>
                <div id="image_details" class="info">
                    <p><label for="filesize">File size</label> <input type="text" id="filesize" name="filesize" ></p>
                    <p><label for="filetype">Type</label> <input type="text" id="filetype" name="filetype" ></p>
                    <p><label for="filedim">Dimension</label> <input type="text" id="filedim" name="filedim" ></p>
                    <p><label for="w">Width</label> <input type="text" id="w" name="w" ></p>
                    <p><label for="h">Height</label> <input type="text" id="h" name="h" ></p>
                </div>
                <div>
                    <input type="submit" value="Upload" name="upload" />
                </div>
            </div>
        </form>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    <!--</fieldset>-->
    </div>
</section>
<?php // $sImage = uploadImageFile(1);?>
<?php 
//confirming the image before redirecting
if(isset($sImage)){
    redirect_to("signature_upload.php"); 	//redirecting to map page
}
?>
<?php include ("../php_includes/layout/footer.php");?>
