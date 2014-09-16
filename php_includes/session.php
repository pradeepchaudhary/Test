<?php if (!isset($_SESSION)) {
  session_start();
}
function message(){
    if(isset($_SESSION["message"])){
        $output  = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";
        //clear message after use
        $_SESSION["message"] = NULL;
        return $output;
    }
}

function errors(){
    if(isset($_SESSION["errors"])){
        $errors = $_SESSION["errors"];
        
        //clear message after use
        $_SESSION["errors"] = NULL;
        
        return $errors;
    }
}

/* 
 * This code is generated under the Project PC1 version2.
 *   * 
 */
?>
