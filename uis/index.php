<?php
include('login.php'); // Includes Login Script

/*if(isset($_SESSION['login_user'])){
header("location: home.php");
}*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>  
        <div id="top">
            <center><img src="img/itb.png"></center>
        </div>
        <br>
        <div id="main">
            <center><strong><h2>Administrator Login</h2></strong></center>
            <br>
            <div id="login">        
                <form action="" method="post">
                    UserName:<input id="name" name="username" placeholder="username" type="text">
                    Password:<input id="password" name="password" placeholder="**********" type="password">
                    <input name="submit" type="submit" value="Login">
                    <span><?php echo $error; ?></span>
                </form>          
            </div>
        </div>
        
        <footer>@2015 All Rights Reserved.</footer>
        
    </body>
</html>