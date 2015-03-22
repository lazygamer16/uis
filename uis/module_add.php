<?php    
    include('session.php');
    include('conn.php');
    
    $error='';
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>   
        <?php include ('template.php'); ?>
            <div>      
                <div style="float: left; width: 10%;" class="four"></div>
                <div style="float: left; width: 65%;" id="two">
                    <h3>Add Course</h3>
                    <div id="addmodule">        
                        <form action="" method="post">
                            Course Name:<input name="cname" type="text">
                            Course:<input name="course" type="text">
                            Semester:<input name="semester" type="password">
                            <input name="addmodule" type="submit" value="Add Module">
                            <span><?php echo $error; ?></span>
                        </form>          
                    </div>
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>      
</html>    