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
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="new_registration.php";
  $login_username = $_POST['username'];
  $_SESSION['username'] = $login_username;
  $login_query = sprintf("SELECT username FROM secure_login WHERE username=%s", GetSQLValueString($login_username, "text"));
  mysqli_select_db($db, DB_NAME);
  $login=mysqli_query($db, $login_query) or die(mysql_error());
  $loginFoundUser = mysqli_num_rows($login);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$login_username;
    //header ("Location: $MM_dupKeyRedirect");
	echo 'Username already exist';
    exit;
  }
}
$registerFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $registerFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "login")) {
  $insert_query = sprintf("INSERT INTO secure_login (username, password) VALUES (%s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

    mysqli_select_db($db, DB_NAME);
    $Result = mysqli_query($db, $insert_query) or die('Database insertion failed. Connect Error: ' .
		"(".$db->connect_errno.")"); //die(mysql_error());
    $_SESSION['userID'] = mysqli_insert_id($db);                                   //getting the userID of current user
    var_dump($_SESSION['userID']);
    var_dump($Result);
    echo $_SESSION['userID'];			
//    setInterval(function(){
//    echo $_SESSION['userID'];
//    }, 5000);

  $insertGoTo = "new_user_form.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<?php include("../php_includes/layout/header.php"); ?>
<section>
    <div id="form_div">
        <form action="<?php echo $registerFormAction; ?>" method="POST" name="login" id="login">
        <!--<fieldset>-->
            <legend><strong>New User Registration</strong></legend>
        <p>Select a username and password
        </p>
        <p>
            <label for="username">Username</label>
            <input name="username" type="text" id="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="newuser" id="newuser" value="Create User">
        <!--</fieldset>-->
        <input type="hidden" name="MM_insert" value="login">
        </form>
    </div>
</section>
<?php include '../php_includes/layout/footer.php';?>
