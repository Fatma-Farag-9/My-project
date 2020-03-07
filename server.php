<?php 

    $dsn = "mysql:host=localhost;dbname=users";
    $user_S= "root";
    $pass_S= "";

//Try Connect To The Database.
try{
    
    $conn= new PDO($dsn, $user_S, $pass_S);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}

catch(PDOException $e){
    
    echo "Failed Connect To Database" . $e->getMassege();
}
    
    
    
    
?>