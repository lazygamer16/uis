<?php
    include('session.php');
    include('conn.php');
    
    // SQL query to pending student 3rd year modules and 3rd year module list
    $sql = "SELECT * from student 
            Inner Join module
                ON student.student_module=module.module_id
            where student.module_confirm=1";
    
    $sql2 = "Select * from module where course ='Third Year'";    
    
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
            <div class="bottom">      
                <div style="float: left; width: 10%;" class="four"></div>
                <div style="float: left; width: 65%;" id="two">
                    <center><h3>Module</h3>
                    <a href='module_add.php'>Add New Module</a>
                    <h4>Pending 3rd Year Modules</h4>
                    <?php
                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width:80%'>
                                    <tr><td>Name</td><td>Course</td><td>Module</td><td>Approve</td><td>Dissaprove</td></tr>";
                            while($row = $result->fetch_assoc()) {
                            echo "<tr><td>";
                            echo $row['student_name']."</td><td>";
                            echo $row['student_course']."</td><td>";
                            echo $row['module_name']."</td><td>";
                            echo "<a href='module_detail.php?no=2&stu=".$row['student_id']."&id=".$row['module_id']."'>Approve</a></td><td>";
                            echo "<a href='module_detail.php?no=3&stu=".$row['student_id']."&id=".$row['module_id']."'>Disapprove</a></td>";
                            }
                            echo "</table>";
                        }
                        else {
                        echo "There are no pending modules.";
                        }    
                    ?>
                    <h4>View 3rd Year Module Details</h4>
                    <?php
                        if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {         
                                    echo "<h5><a href='module_detail.php?id=".$row2['module_id']."'>".$row2['module_name']."</a></h5>";                                
                            }
                        }    
                    ?>
                    </center>
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>           
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>
</html>