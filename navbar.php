<!-- Start Header -->
<?php include "function.php"; ?>
        <header class="header" >
                    <div class="container">
                        <img src="image/logo.png" />
                        <nav class="navbar" >
                            <ul>
                                <li <?php setactive("Home"); ?>><a href="index.php" >home</a></li>
                                <li><a href="#" >pages</a></li>
                                <li <?php setactive("Work"); ?>><a href="work.php" >work</a></li>
                                <li><a href="#" >blog</a></li>
                                <li <?php setactive("Contact"); ?>><a href="contact.php" >contact</a></li>
                                <li><a href="logout.php" >Logout</a></li>
                            </ul>
                         </nav>
                    
                    </div>
            </header>
                    
            <!-- End Header -->