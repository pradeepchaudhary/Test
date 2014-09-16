<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<?php require_once '../php_includes/db_connection.php';?>
<?php require_once '../php_includes/functions.php';?>
<?php $loginFormAction=NULL;
if (isset($_POST['username'])){
    $loginFormAction = login("admin",$_POST['username'], $_POST['password']);
}
?>
<?php include("../php_includes/layout/header.php"); ?>
<nav>
    <ul type="square">
        <!--<li>Administrators, <a href="admin.php">click here for admin login.</a></li>-->
    </ul>
</nav>
<section>
    <div id="form_div">
        <form ACTION="<?php echo $loginFormAction; ?>" name="login" method="POST">
            <!--<fieldset>-->
            <legend><strong>Administrator Login</strong></legend>
            <p>
                <label for="username">Admin name</label>
                <input name="username" type="text" id="username">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" name="login" id="login" value="Login">
<!--                    </p>
            <p>-->
<!--                <input name="newuser" type="button" id="newuser" onClick="window.location.href='new_registration.php'" value="New User">-->
            </p>   
            <!--</fieldset>-->
        </form>
    </div>
</section>
<?php include("../php_includes/layout/footer.php"); ?>
