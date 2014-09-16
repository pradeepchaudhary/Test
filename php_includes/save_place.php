<?php
if (!isset($_SESSION)) {
  session_start();
}
/* 
 * This code is generated under the Project PC1 version2.
 */
require_once '../php_includes/db_connection.php';
require_once '../php_includes/functions.php';
$place = $_POST['place'];
$description = $_POST['description'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];
$curruserid = current_userid();
//gobal $curruserid;
$db->query("INSERT INTO tbl_places SET place='$place', description='$description', lat='$latitude', lng='$longitude', userid='$curruserid'");
$place_id = $db->insert_id;
echo $place_id;
?>