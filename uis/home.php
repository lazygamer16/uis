<?php
include('session.php');
include('nahead.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>   
            <?php include ('template.php'); ?>
            <div class="bottom">
              <div style="float: left; width: 30%;" id="one"><?php echo $nhead; ?></div>
              <div style="float: left; width: 30%;" id="two"><?php echo $ahead; ?></div>
              <div style="float: left; width: 30%;" id="three">
                    <center><h3>3rd Year Degree Module</h3><img src="img/itblogo.png" height='180' width='175'></center>
                    <ol>
                    <?php
                        if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {         
                                $mhead = "<li><h3><a href='module_detail.php?id=".$row3['module_id']."'>".$row3['module_name']."</a></h3></li>";
                                echo $mhead;
                            }
                            echo "<br><a href='module.php'>View All Modules</a>";
                        }                    
                    ?></ol></div>
            </div>
        </div>

        <footer>2015 All Rights Reserved.</footer>    
    </body>
</html>