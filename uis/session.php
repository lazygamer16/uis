<?php
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysql_connect("localhost", "root", "");

    // Selecting Database
    $db = mysql_select_db("uis", $connection);
    session_start();// Starting Session

    // Storing Session
    $user_check=$_SESSION['login_user'];
    
    $login_session="";

    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("select user_name from user where user_name='$user_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session = $row['user_name'];
        if(!isset($login_session)){
        mysql_close($connection); // Closing Connection
        header('Location: index.php'); // Redirecting To Home Page
        }

?>