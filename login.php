<?php
    session_start();

    include "server.php";

    if(isset($_SESSION['username'])){
            header ("Location: index.php");
        }
        
    include "check/checklogin.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/styleF.css" />
</head>
<body>
    <div class="container" >
        <h1>Login</h1>
            <div class="form">
                <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                    <div class="textbox" >
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="UserName" name="username" autocomplete="off" value="<?php if(isset($username)){ echo $username;} ?>" />
                         <span class="Error"><?php if(isset($usernameErr)){ echo $usernameErr;} ?></span>
                    </div>
                    <div class="textbox" >
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" autocomplete="new-password" value="<?php if(isset($password)){ echo $password;} ?>" />
                        <span class="Error"><?php if(isset($passwordErr)){ echo $passwordErr;} ?></span>
                    </div>
                    <input class="btn" type="submit" value="Login" name="login" />
                    
                 </form>
                <form method="POST" action="signup.php" >
                    <input class="btn" type="submit" value="Sign Up" />
                    </form>
            </div>
    </div>

 
</body>
</html>