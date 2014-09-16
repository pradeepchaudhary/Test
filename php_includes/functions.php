<?php
function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}

function mysql_prep($string){
    global $db;
    $escaped_string = mysqli_real_escape_string($db, $string);
    return $escaped_string;
}

function confirm_query($result_set){
    if(!$result_set){
        die("Database query failed.");
    }
}

function form_errors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
      $output .= "<div class=\"error\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach ($errors as $key => $error) {
        $output .= "<li>";
        $output .= htmlentities($error);
        $output .= "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function login($user_type, $username, $password){ // user/admin login
    global $db;
    if (isset($username)) {
        $login_username=$username;
        $password=$password;
        mysqli_select_db($db, DB_NAME);
        if($user_type=="user"){
                //redirect_to pages
            $on_success_redirect = "prefilled_form.php";
            $on_failure_redirect = "index.php";
            $login_query=sprintf("SELECT * FROM secure_login WHERE username=%s AND password=%s",
            GetSQLValueString($login_username, "text"), GetSQLValueString($password, "text")); 
        }else if($user_type=="admin"){
            //redirect_to pages
            $on_success_redirect = "admin_home.php";
            $on_failure_redirect = "admin_login.php";
            $login_query=sprintf("SELECT * FROM secure_login WHERE username=%s AND password=%s",
            GetSQLValueString($login_username, "text"), GetSQLValueString($password, "text")); 
        }
        $login = mysqli_query($db, $login_query) or die(mysql_error());
        $login_recordset = mysqli_fetch_assoc($login);
        $loginFoundUser = mysqli_num_rows($login);
        if ($loginFoundUser) {
            $loginStrGroup = "";

    //       if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
           //declare two session variables and assign them
           $_SESSION['userID'] = $login_recordset['userID'];
           $_SESSION['username'] = $login_username;
           $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

           if (isset($_SESSION['PrevUrl']) && true) {
               $on_success_redirect = $_SESSION['PrevUrl'];	
           }
           header("Location: " . $on_success_redirect );
           }
        else {
          header("Location: " . $on_failure_redirect );
        }
    }
}

function current_userid(){
    if(isset($_SESSION['userID'])){
        $curruserid = $_SESSION['userID'];
    }else{
        echo "UserID not defined. System will use a random value now.";
        $curruserid = rand();    
    }
    return $curruserid;
}

function welcome(){
    if(isset($_SESSION['username'])){
    echo "Welcome ".$_SESSION['username']." ";
    }else{
    echo "Username not available. No Session defined.";
    }
}

function find_admin_by_username($username){
    global $db;
    
    $safe_username = mysqli_real_escape_string($db, $username);
    
    $query  = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1;";
    $admin_set = mysqli_query($db, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)){
        return $admin;
    }else{
        return NULL;
    }
}

function password_encrypt($password){
    $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length = 22; 					// Blowfish salts should be 22-characters or more
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
}

function generate_salt($length) {
    // Not 100% unique, not 100% random, but good enough for a salt
    // MD5 returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));

          // Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);

          // But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);

          // Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);

    return $salt;
}

function password_check($password, $existing_hash) {
        // existing hash contains format and salt at start
    $hash = crypt($password, $existing_hash);
    if ($hash === $existing_hash) {
      return true;
    } else {
      return false;
    }
}

function attempt_login($username, $password){
    $admin = find_admin_by_username($username);
    if($admin){
        //found admin, now check password
        if(password_check($password, $admin["hashed_password"])){
            //password matched
            return $admin;
        }else{
            //password does not match
            return FALSE;
        }
    }else{
        //admin not found
        return FALSE;
    }
}

function logged_in(){
    return isset($_SESSION["admin_id"]);
}

function confirm_logged_in(){
    if(!logged_in()){
        redirect_to("login.php");
    }
}

function uploadImageFile($check) { // Note: GD library is required for this function
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth = 150;
        //### write code for checking the requirement then changing the height as desired.
        if($check==1){
            $iHeight = 200; // desired image result dimensions
        }else if($check==2){
            $iHeight = 100; // desired image result dimensions
        }
        $iJpgQuality = 90;

        if ($_FILES) {
            // if no errors and size less than 2MB
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 2048 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                    // new unique filename
                    //$photo_loc = NULL;
//                    $sign_loc = NULL;
                    if($check==1){
                        if(isset($_SESSION)){
                            $sTempFileName = '../public/images/User_uploads/' . $_SESSION['username'].'photo';
                        }else{
                            $sTempFileName = '../public/images/User_uploads/' . md5(time().rand()).'photo';
                        }
//                        $_SESSION['photo_loc'] = $sTempFileName;
                    }else if($check==2){
                        if(isset($_SESSION)){
                            $sTempFileName = '../public/images/User_uploads/' . $_SESSION['username'].'sign';
                        }else{
                            $sTempFileName = '../public/images/User_uploads/' . md5(time().rand()).'sign';
                        }
//                        $_SESSION['sign_loc'] = $sTempFileName;
                    }

                    // move uploaded file into _images/user_uploads folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
                    $testforimage=true;

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                    if (!$aSize) {
                        @unlink($sTempFileName);
                        return;
                    }

                    // check for image type
                    switch($aSize[2]) {
                        case IMAGETYPE_JPEG:
                        $sExt = '.jpg';

                        // create a new image from file 
                        $vImg = @imagecreatefromjpeg($sTempFileName);
                        break;
                        case IMAGETYPE_GIF:
                        $sExt = '.gif';

                        // create a new image from file 
                        $vImg = @imagecreatefromgif($sTempFileName);
                        break;
                        case IMAGETYPE_PNG:
                        $sExt = '.png';

                        // create a new image from file 
                        $vImg = @imagecreatefrompng($sTempFileName);
                        break;
                        default:
                        @unlink($sTempFileName);
                        return;
                    }

                    // create a new true color image
                    $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                    // copy and resize part of an image with resampling
                    imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                    // define a result image filename
                    $sResultFileName = $sTempFileName . $sExt;
                    if($check==1){
                        $_SESSION['photo_loc'] = $sResultFileName;
                    }else if($check==2){
                        $_SESSION['sign_loc'] = $sResultFileName;
                    }

                    // output image to file
                    imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                    @unlink($sTempFileName);
                    
                    //*** inserting the information in the database [or atleast trying to;)...]
                    $currentuserid = current_userid();
                    if(($_SESSION['photo_loc'] && $_SESSION['sign_loc'])!=NULL){
                        $insert_query = sprintf("INSERT INTO image_file_details (userID, photoFile, signFile) VALUES (%s, %s, %s)",
                                        GetSQLValueString($currentuserid, "text"),
                                        GetSQLValueString($_SESSION['photo_loc'], "text"),
                                        GetSQLValueString($_SESSION['sign_loc'], "text"));
                        global $db;
                        mysqli_select_db($db, DB_NAME);
                        $Result = mysqli_query($db, $insert_query) or die('Database insertion failed. Connect Error: ' .
                                    "(".$db->connect_errno.")");
                        $_SESSION['photo_loc'] = NULL;
                        $_SESSION['sign_loc'] = NULL;
                        unset($_SESSION['photo_loc']);
                        unset($_SESSION['sign_loc']);
                    }

                    return $sResultFileName;
                    }
                }
            }
        }
    }
}

function upload_doc(){
    define("UPLOAD_DIR", "docs/");
    $allowedExts = array("pdf", "doc", "docx", "odt");
    $allowed_mime_types = array("application/pdf",      //for pdf files
                                "application/msword",   //for word files with .doc extension
                                "application/vnd.openxmlformats-officedocument.wordprocessingml.document",  //for .docx files
                                "binary/octet-stream",      //for pdf
                                "application/vnd.oasis.opendocument.text");     //for opendocument
    if (!empty($_FILES["myFile"])){
        $myFile = $_FILES["myFile"];
        $get_ext = explode(".", $myFile["name"]);
        $extension = strtolower(end($get_ext));
        if(in_array($extension, $allowedExts)){
            if(in_array($myFile["type"], $allowed_mime_types)){
                $name = "valid extention and valid type: ".$myFile["type"];
                if ($myFile["error"] !== UPLOAD_ERR_OK) {
                    echo "<p>An error occurred.</p>";
                    exit;
                }
                // ensure a safe filename by converting all unacceptable charaters,if any, to underscore.
                $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

                // don't overwrite an existing file
                $i = 0;
                $parts = pathinfo($name);
                while (file_exists(UPLOAD_DIR . $name)) {
                    $i++;
                    $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
                }

                // preserve file from temporary directory
                $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
                if (!$success) { 
                    echo "<p>Unable to save file.</p>";
                    exit;
                }

                // set proper permissions on the new file
                chmod(UPLOAD_DIR . $name, 0644);
                return $name;
            }else{
                $name = "valid extention but invalid type: ".$myFile["type"];
            }
        }else{
            $name = "invalid extention, please upload acceptable formats only";
        }
        return $name;
    }
//  
//2nd
//    $mimes = array( 'application/pdf',
//                'application/x-pdf',
//                'application/acrobat',
//                'application/msword',
//                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
//                );
//    if(!in_array($_FILES['myFile']['type'], $mimes)) {
//        $msg1='<div class="alert alert-error">Invalid myFile format, Please choose only PDF or MS word files</div>';
//    }
//    elseif($_FILES['myFile']['size']>2097152){
//        $msg2='<div class="alert alert-error">The file is too large,(must be < 2MB)</div>';
//    }
//    
// Already working method
//    define("UPLOAD_DIR", "docs/");
//    if (!empty($_FILES["myFile"])) {
//        $myFile = $_FILES["myFile"];
//        if ($myFile["error"] !== UPLOAD_ERR_OK) {
//            echo "<p>An error occurred.</p>";
//            exit;
//        }
//        // ensure a safe filename
//        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
//
//        // don't overwrite an existing file
//        $i = 0;
//        $parts = pathinfo($name);
//        while (file_exists(UPLOAD_DIR . $name)) {
//            $i++;
//            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
//        }
//
//        // preserve file from temporary directory
//        $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
//        if (!$success) { 
//            echo "<p>Unable to save file.</p>";
//            exit;
//        }
//
//        // set proper permissions on the new file
//        chmod(UPLOAD_DIR . $name, 0644);
//        return $name;
//    }
}
?>