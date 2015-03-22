<?php    
    include('session.php');
    include('conn.php');
    
    $head = $_GET['id'];
    
    $sql = "Select id, title, LEFT(description, 275) as descr, image, date_updated from ".$head." ORDER by date_updated";
    
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
                        echo "<center><h3>Latest ".$head."</h3></center>";
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<table><tr><td>";
                            echo "<img src='img/".$row['image'].".jpg' height='180' width='300'></td><td>";
                            echo "<strong>".$row['title']."</strong><h5>Date Updated: ".$row['date_updated']."</h5>".$row['descr']."...<br><a href='list_detail.php?id="
                                    .$row['id']."&name=".$head."'>View Full Story</a>";      
                            echo "</td></tr><td height=20px;></td></table>";
                            }
                        }    
                    ?>
                                       
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>
    
    
</html>

