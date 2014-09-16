<?php
//check for mysqli
//if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//    echo 'We don\'t have mysqli!!!';
//} else {
//    echo 'Phew we have it!';
//}

//connect to database
define("DB_SERVER", "localhost");
define("DB_USER", "pc");
define("DB_PASSWORD", "pradeep");
define("DB_NAME", "mydatabase");

$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if ($db->connect_errno){
	die('Database connection failed. Connect Error: ' .
		$db->connect_error()."(". $db->connect_errno. ")"
	);
}
?>
