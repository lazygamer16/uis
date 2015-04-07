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
                    <h3>Add Course</h3>
                    <div id="addmodule">        
                        <form action="" method="post">
                            Module Name:<input name="name" type="text"><br>
                            Course:<select name="course">
                                      <option value="Bachelor of Science in Internet Computing">Bachelor of Science in Internet Computing</option>
                                      <option value="Third Year">Third Year</option>
                                    </select><br>
                            Module Info:<input name="info" type="text"><br>
                            Semester:<select name="sem">
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                      <option value="4">Four</option>
                                      <option value="5">Five</option>
                                      <option value="6">Six</option>
                                      <option value="7">Seven</option>
                                      <option value="8">Eight</option>
                                    </select><br>
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