<?php
session_start();
$page_name = "Home"; 
    
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}else{
    include "include/header.php";
    include "include/navbar.php";
    include "include/slide.php";
    include "include/bannericons.php";

?>

            <div class="strip" >
                <div class="container">
                    <div class="container-strip">
            <p>an attention grabbing call-to-action banner </p>
            <button>BY NOW</button>
                    </div>
                </div>
            </div>

<?php include "include/footer.php"; }?>