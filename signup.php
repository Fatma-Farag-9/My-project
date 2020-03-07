<?php
    session_start();

    include "server.php";

    if(isset($_SESSION['username'])){
            header ("Location: index.php");
        }
    include "check/check.php";
        

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/styleF.css" />
</head>
<body>
    <div class="container" >
        <h1>Sign Up</h1>
            <div class="form">
                <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                    <span class="Error"><?php if(isset($uncount)) {echo $uncount;} ?></span>
                    <div class="textbox" >
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Full Name" name="fullname" autocomplete="off" value="<?php echo $fullname; ?>" />
                        <span class="Error"><?php echo $fullnameErr; ?></span> 
                    </div>
                    <div class="textbox" >
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="UserName" name="username" autocomplete="off" value="<?php echo $username; ?>" />
                         <span class="Error"><?php echo $usernameErr; ?></span>
                    </div>
                    <div class="textbox" >
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="text" placeholder="Enter Your E-mail" name="email" value="<?php echo $email; ?>" />
                        <span class="Error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="textbox" >
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" autocomplete="new-password" value="<?php echo $password; ?>" />
                        <span class="Error"><?php echo $passwordErr; ?></span>
                    </div>
                    <input class="btn" type="submit" value="Sign in" name="signup" />
                 </form>
                <form method="POST" action="login.php" >
                <input class="btn" type="submit" value="Login" />
                    </form>
            </div>
    </div>

 
</body>
</html>