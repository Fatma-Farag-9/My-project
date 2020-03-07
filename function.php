<?php 
        // set class active.
    function setactive($name){
        global $page_name;
        
        if(isset($page_name) && $page_name == $name ){
            echo " class='active' ";
            
        }
    }
    
    function sanitize_my_email($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

    
?>