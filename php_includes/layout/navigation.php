<?php welcome(); ?>
<a href="../php_includes/logout.php">logout</a>
<p>
    Please follow through all the steps before logging out.
</p>
<?php
    $current_page_name = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
//    echo "The current page name is ".$current_page_name;
?>
<ul type="square" class="navigation">
    <li><a <?php if($current_page_name=="new_user_form.php"){echo " class=\"selected\"";}?> href="new_user_form.php">Enter Details</a></li>
    <li><a <?php if($current_page_name=="photo_upload.php"){echo " class=\"selected\"";}?> href="photo_upload.php">Upload Photograph</a></li>
    <li><a <?php if($current_page_name=="signature_upload.php"){echo " class=\"selected\"";}?> href="signature_upload.php">Upload Signature</a></li>
    <li><a <?php if($current_page_name=="location_map.php"){echo " class=\"selected\"";}?> href="location_map.php">Map your Address</a></li>
    <li><a <?php if($current_page_name=="prefilled_form.php"){echo " class=\"selected\"";}?> href="prefilled_form.php">Review Details</a></li>
</ul>