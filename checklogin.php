<?php 

     $username = $password = "";
    $usernameErr = $passwordErr = "";
    $errors = array();
    if( isset($_POST['login']) ){
            
    
        // check the input and validation and set in variables.
       
        // Check User Name:
        if( empty($_POST['username']) ){
            
            $usernameErr = "userName name is required";
            array_push($errors, $usernameErr);
        }else{
            
            $username = test_input($_POST['username']);
            
            
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
            
            $stmt = $conn->prepare("SELECT UserName FROM user WHERE UserName = ? ");
            
            $stmt->execute(array($username));
            $count1 = $stmt->rowCount();
            
            if ($count1 == 0 ){
                $usernameErr = "UserName Uncorrect";
            }
            //End Check.
            //check if password is exist in database.
             $stmt = $conn->prepare("SELECT  Password FROM user WHERE  Password = ?");
            
            $stmt->execute(array($hashpass));
            $count2 = $stmt->rowCount();
            
            if ($count2 == 0){
                $passwordErr = "Password Uncorrect";
            }
            //End Check.
            //check if is avalid form and insrt the input in database.
            if($count1 > 0 && $count2 > 0){

                $_SESSION['username'] = $username;
                header("Location: index.php");
            }
        }
    }
        
    

    function test_input($data){
        
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = Filter_Var($data, FILTER_SANITIZE_STRING);
        
        return $data;
    }
?>