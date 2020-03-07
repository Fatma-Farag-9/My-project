<?php 

session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}else{
$page_name = "Work";

        include "include/header.php";
        include "include/navbar.php";
}
?>    