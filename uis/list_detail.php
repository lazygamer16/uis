<?php    
    include('session.php');
    include('conn.php');
    
    $head = $_GET['id'];
    $table = $_GET['name'];
      
    $sql = "Select id, title, description, image, date_updated from ".$table." where id=".$head."";
    
    // SQL query to fetch news and announcement.
    
    $result = $conn->query($sql);
    
    
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
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                           
                            echo "<center><h3>".$row['title'];
                            echo "</h3><img src='img/".$row['image'].".jpg' width='650'></center>";
                            echo "<h5>Date Updated:".$row['date_updated'];
                            echo "</h5>".$row['description'];
                            
                            }
                        }    
                    ?>
                <h5>2015 All Rights Reserved.</h5>                        
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
    </body>
        
</html>