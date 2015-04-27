<?php    
    include('session.php');
    include('conn.php');
    
    $head = $_GET['id'];
    $table = $_GET['name'];
      
    $sql = "Select * from ".$table." where id=".$head."";
	$sql2 = "Select * from ".$table." where id=".$head."";
    
	
    // SQL query to fetch news and announcement.
    
    $result = $conn->query($sql);
	$result2 = $conn->query($sql2);
    
    
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
                        if ($result->num_rows > 0 && $table=='news') {
                            while($row = $result->fetch_assoc()) {
							$myinput= $row['date_updated']; 
							$sqldate=date('d-m-Y',strtotime($myinput));
                            echo "<center><h3>".$row['title'];
                            echo "</h3><img src='img/".$row['image'].".jpg' width='650'></center>";
                            echo "<h5>Date Updated: ".$sqldate;
                            echo "</h5>".$row['description'];
                            
                            }
                        }
						else {
							while($row2 = $result2->fetch_assoc()) {
							$myinput= $row2['date_updated']; 
							$sqldate=date('d-m-Y',strtotime($myinput));
                            echo "<center><h3>".$row2['title'];
                            echo "</h3><img src='img/".$row2['image'].".jpg' width='650'></center>";
							echo "<h5>Date Updated: ".$sqldate;
							echo "<h5>Time: ".$row2['time'];
							echo "<h5>Venue: ".$row2['venue'];
                            echo "<h5>Link: <a href='".$row2['link']."' target='_blank'>More Information</a>";
                            echo "</h5>".$row2['description'];
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