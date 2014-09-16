<?php welcome(); ?>
<a href="../php_includes/logout.php">logout</a>
<p>
    What do you want to do?
</p>
<?php
    $current_page_name = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
//    echo "The current page name is ".$current_page_name;
?>
<ul type="square" class="navigation">
    <li><a <?php if($current_page_name=="admin_exam_upload.php"){echo " class=\"selected\"";}?> href="admin_exam_upload.php">Upload Exam info</a></li>
    <li><a <?php if($current_page_name=="admin_data_page.php"){echo " class=\"selected\"";}?> href="admin_data_page.php">Review Students data</a></li>
    <li><a <?php if($current_page_name=="signature_upload.php"){echo " class=\"selected\"";}?> href="signature_upload.php">Download data</a></li>
    <li><a <?php if($current_page_name=="location_map.php"){echo " class=\"selected\"";}?> href="location_map.php">Upload admit cards</a></li>
    <li><a <?php if($current_page_name=="prefilled_form.php"){echo " class=\"selected\"";}?> href="prefilled_form.php">Upload examination centers</a>
</ul>