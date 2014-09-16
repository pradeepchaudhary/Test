<?php
// *** Logout the current user.
$logoutGoTo = "../public/index.php";
if (!isset($_SESSION)) {
  session_start();
}
//***unsetting the session variables used in upload_image function.
$_SESSION['photo_loc'] = NULL;
$_SESSION['sign_loc'] = NULL;
unset($_SESSION['photo_loc']);
unset($_SESSION['sign_loc']);

$_SESSION['username'] = NULL;
$_SESSION['userID'] = NULL;
unset($_SESSION['username']);
unset($_SESSION['userID']);
mysqli_close($db);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>