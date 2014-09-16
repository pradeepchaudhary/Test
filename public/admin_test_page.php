<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<!--This code is generated under the Project PC1 version2.-->
<?php require_once '../php_includes/db_connection.php';?>
<?php require_once '../php_includes/functions.php';?>
<!--declaring the navigation variables-->
<?php 
    $previous='support.php';
    $next='support.php';
    $admin_test_page_action = NULL;
?>

<?php include("../php_includes/layout/header.php");?>
<nav>
<?php include ("../php_includes/layout/admin_navigation.php");?>
</nav>
<section>
    <div id="form_div">
        <form action="<?php echo $admin_test_page_action; ?>" method="POST" enctype="multipart/form-data" name="form1">
            <!--<fieldset>-->
                <legend><strong>Exam Details</strong></legend>
                <p>
                <label for="examname">Examination Name</label>
                <input type="text" name="examname" id="examname" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="organisation">Organisation</label>
                <input type="text" name="organisation" id="organisation" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="position">Position</label>
                <input type="text" name="position" id="position" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="eligibility">Eligibilty</label>
                <input type="text" name="eligibility" id="eligibility" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="last_date">Last Date</label>
                <input type="text" name="last_date" id="last_date" value="<?php //echo $firstname; ?>">
                </p>
                <p>
                <label for="payment">Payment Required</label>
                <input type="checkbox" name="payment" id="payment" value="<?php //echo $firstname; ?>">
                </p>
                <div id="fee_details">
                    <p>
                    <legend><strong>Fee Details</strong></legend>
                    </p>
                    <p>
                    <input type="checkbox" name="same_fee_check" id="same_fee_check" value="<?php //echo $firstname; ?>" checked>
                    <label for="same_fee_check">Same for all</label>
                    <input type="text" name="same_fee" id="same_fee" value="<?php //echo $firstname; ?>">
                    </p>
                    <p>
                        <label>Fee Exemption</label>
                        <label for="exempt_gen" style="padding-left: 80px;">General</label>
                        <input type="checkbox" id="exempt_gen">
                        <label for="exempt_obc">OBC</label>
                        <input type="checkbox" id="obc">
                        <label for="exempt_scst">SC/ST</label>
                        <input type="checkbox" id="scst">
                        <label for="exempt_girls">Girls</label>
                        <input type="checkbox" id="girls">
                    </p>
                    <p>
                        <label for="gen">For General</label>
                        <input type="text" name="gen" id="gen" value="">
                    </p>
                    <p>
                        <label for="obc">For OBC</label>
                        <input type="text" name="obc" id="obc" value="">
                    </p>
                    <p>
                        <label for="scst">For SC/ST</label>
                        <input type="text" name="scst" id="scst" value="">
                    </p>
                    <p>
                        <label for="da">For Differently abled</label>
                        <input type="text" name="da" id="da" value="">
                    </p>
                    <p>
                        <label for="girls">For Girls</label>
                        <input type="text" name="girls" id="girls" value="">
                    </p>
                </div>
<!--            <div id="about_exam">
                Write some information about exam here.
            </div>
                <div class="item"><a rel="clearbox[gallery=Gallery,,comment=Venice,Italy]" href="../images/Arunachal-23July2013.jpg" title="Venice"><img class="border" src="../images/thumb5.jpg" alt="Venice, Italy" /></a></div>-->
        </form>
        <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>
    </div>
</section>
<!--include tinymce-->
<!--<script type="text/javascript" src="javascripts/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
initialise_mce("#examname");
initialise_mce("#examinfo");
initialise_mce("#about_exam");
</script>-->
<?php include("../php_includes/layout/footer.php"); ?>
