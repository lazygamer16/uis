<?php    
    include('session.php');
    include('conn.php');
    include('madd.php');
    
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
                    <h3>Add ExperiencePLUS Module</h3>
                    <div id="addmodule">        
                        <form action="" method="post">
                            Module Name:<input name="name" type="text" placeholder="Name of Module"><br>
                            Course:<input name="course" type="text" value="Third Year" readonly>
                            Module Info:<input name="info" type="text" placeholder="More information"><br>
                            Semester:<input name="sem" type="text" value="5" readonly><br>
                            <input name="addmodule" type="submit" value="Add Module">
                            <span><?php echo $error1; ?></span>
                        </form>          
                    </div>
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>      
</html>    