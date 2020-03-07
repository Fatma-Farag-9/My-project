<?php 

    $fullname = $username = $email = $password = "";
    $fullnameErr = $usernameErr = $emailErr = $passwordErr = "";
    $errors = array();
    if( isset($_POST['signup']) ){
            
    
        // check the input and validation and set in variables.
        // check Fuul Name:
        if( empty($_POST['fullname']) ){
            
            $fullnameErr = "full name is required";
            array_push($errors, $fullnameErr);
        }else{
            
            $fullname = test_input($_POST['fullname']);
            if ( !preg_match("/^[a-zA-Z ]*$/",$fullname) ){
                
                $fullnameErr = "Only letters and white space allowed";
                array_push($errors, $fullnameErr);
            }
        }
        // Check User Name:
        if( empty($_POST['username']) ){
            
            $usernameErr = "userName name is required";
            array_push($errors, $usernameErr);
        }else{
            
            $username = test_input($_POST['username']);
            
            }
        
        // Check E-Mail :
        if( empty($_POST['email']) ){
            
            $emailErr = "email is required";
            array_push($errors, $emailErr);
        }else{
            
            $email = test_input($_POST['email']);
            if ( !Filter_Var($email , FILTER_VALIDATE_EMAIL) ){
                
                $emailErr = "the e-Mail is invalid";
                array_push($errors, $emailErr);
            }
        }
        //check Password :
        if( empty($_POST['password']) ){
            
            $passwordErr = "password is required";
            array_push($errors, $passwordErr);
        }else{
            
            $password = test_input($_POST['password']);
            $hashpass = sha1($password);
            if(strlen($password) < 8 ){
                $passwordErr = "password must be greater then <strong>8</strong> chars";
                array_push($errors, $passwordErr);
            }
            }
        
        if(count($errors) == 0){
            //check if username is exist in database
            $stmt = $conn->prepare("SELECT UserName FROM user WHERE UserName = ? ");
            
            $stmt->execute(array($username));
            $count1 = $stmt->rowCount();
            
            if ($count1 >0 ){
                $usernameErr = "UserName Already Exist";
            }
            //End Check.
            //check if email is exist in database.
             $stmt = $conn->prepare("SELECT  Email FROM user WHERE  Email = ?");
            
            $stmt->execute(array($email));
            $count2 = $stmt->rowCount();
            
            if ($count2 >0){
                $emailErr = "Email Already Exist";
            }
            //End Check.
            //check if is avalid form and insrt the input in database.
            if($count1 == 0 && $count2 == 0){
                
            $query = $conn->prepare("INSERT INTO user (FullName, UserName, Email, Password) 
                    VALUES (? ,? ,? ,?)");
            
            $query->execute(array($fullname , $username , $email ,$hashpass));
            $count3 = $query->rowCount();
            //check if execute then start the session and go to the index page.
            if ($count3 > 0){
                $_SESSION['username'] = $username;
                header("Location: index.php");
            }
        }
            
        }
    }
        

 // function to sanitize input.
    function test_input($data){
        
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = Filter_Var($data, FILTER_SANITIZE_STRING);
        
        return $data;
    }
?>