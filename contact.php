<?php 

session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}else{
$page_name = "Contact";

        include "include/header.php";
        include "include/navbar.php";
        include "function.php";
    
?>    
<?php 
        if(isset($_POST['contact'])){
            
            $secure_email = sanitize_my_email($_POST['email']);
            if($secure_email == true ){
                $to_email = "mohamedredafayed0@gmail.com";
                $subject = "Testing PHP Mail";
                $message = $_POST['message'];
                $headers = $_POST['email'];
                
               $send = mail($to_email, $subject, $message);
               
            }else {
                echo "Email is invalid";
            }
        }

?>
    <article class="contact-me">
                <div class="container">
                    <div class="information">
                        <h1>Contact me</h1>
                        <p>Lorem ipsum dolor sit amet, ea doming until epicuri iudicabit nam, te usu virtute placerat. purto brute disputando cu est.</p>
                        <p>Elsooq Street - Nawag<br/> Tanta, Algharbia <br/> Egypt </p>
                        
                           <span>Email:</span> mohammadredafayed0@gmail.com <br/>
                            <span>Phone:</span> 01003877497
                        
                    </div>
                    <div class="form">
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            Name*
                            <input type="text" name="name" placeholder="Your Name" autocomplete="off" value="" />
                            <br>
                            <br>
                            Email Address*
                            <input type="email" name="email" placeholder="Your Email" autocomplete="off" value=""/>
                            <br>
                            <br>
                            Email Address*
                            <textarea cols="50" rows="15" name="message" placeholder="Inter Your Message" autocomplete="off" value=""></textarea>
                            <br>
                            <button value="CONTACT ME" name="contact"> CONTACT ME</button>
                        </form>
                    </div>
                </div>
            </article>
    
    <?php
        include "include/footer.php";
}
?>
