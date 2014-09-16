<?php require_once '../php_includes/session.php';?>
<!DOCTYPE html>
<?php require_once '../php_includes/db_connection.php';?>
<?php require_once '../php_includes/functions.php';?>
<?php 
$loginFormAction=NULL;
if (isset($_POST['username'])){
    $loginFormAction = login("user",$_POST['username'], $_POST['password']);
}
//if (isset($_GET['accesscheck'])) {
//  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
//}
?>
<?php include("../php_includes/layout/header.php"); ?>
<nav>
    <ul type="square">
        <li>Administrators, <a href="admin_login.php">click here for admin login.</a></li>
    </ul>
</nav>
<section>
    <div id="form_div">
        <form ACTION="<?php echo $loginFormAction; ?>" name="login" method="POST">
            <!--<fieldset>-->
            <legend><strong>Login</strong></legend>
            <p>
                <label for="username">Username</label>
                <input name="username" type="text" id="username">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" name="login" id="login" value="Login">
                <a href="new_registration.php">New User?</a>
                <!--<input name="newuser" type="button" id="newuser" onClick="window.location.href='new_registration.php'" value="New User">-->
            </p>   
            <!--</fieldset>-->
        </form>
    </div>
</section>
<?php include("../php_includes/layout/footer.php"); ?>
