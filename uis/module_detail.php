<?php    
    include('session.php');
    include('conn.php');
    
    if (isset($_GET['no'])&&($_GET['id'])&&($_GET['stu'])) {
    $sql3 = "UPDATE student SET module_confirm = ".$_GET['no']." where student_id =".$_GET['stu']."";
    
        if ($conn->query($sql3) === TRUE) {
        
    } else {
        echo "Error updating record: " . $conn->error;
        }  
    }
    
    $id = $_GET['id'];
    
    $abc = "Select * from 3module
            Inner Join module
                On 3module.module_id=module.module_id
            Inner Join staff
                on staff.staff_id=3module.staff_id
            where 3module.module_id=".$id."";
    
    $sql = "SELECT * from student 
            Inner Join module
                ON student.student_module=module.module_id
            where module_id=".$id." and student.module_confirm=2";
            
    $sql2 = "SELECT * from student 
            Inner Join module
                ON student.student_module=module.module_id
            where module_id=".$id." and student.module_confirm=3";        
    
    // SQL query to fetch news and announcement.
    
    $res = $conn->query($abc);
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
                        if ($res->num_rows > 0) {
                            while($row3 = $res->fetch_assoc()) {                              
                                echo "<center><h3>".$row3['module_name']."</h3></center>Module Info: ".$row3['module_info']."</h4>
                                        <h4>Day of Lecture: ".$row3['dayoflect']."</h4><h4>Pre-requisite: ".$row3['prereq']."</h4><h4>Lecturer: ".$row3['staff_name'].
                                        "</h4><h4>Office Location: ".$row3['staff_room']."</h4>";
                            }
                        } 
                    ?>
                    <h4>Approved Students</h4>
                    <?php
                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width:80%'>
                                <tr><td>Name</td><td>Course</td><td>Enroll Date</td></tr>";
                            while($row = $result->fetch_assoc()) {                           
                                echo "<tr><td>".$row['student_name']."</td><td>".$row['student_course']."</td><td>".$row['enroll_date']."</td></tr>";
                            }
                        }
                        else {
                            echo "There are no students approved for this course.";
                        }    
                            echo "</table>";
                    ?>
                    <h4>Disapproved Students</h4>
                    <?php
                        if ($result2->num_rows > 0) {
                            echo "<table border='1' style='width:80%'>
                                <tr><td>Name</td><td>Course</td><td>Enroll Date</td></tr>";
                            while($row2 = $result2->fetch_assoc()) {                           
                                echo "<tr><td>".$row2['student_name']."</td><td>".$row2['student_course']."</td><td>".$row2['enroll_date']."</td></tr>";
                            }
                        }
                        else {
                            echo "There are no students approved for this course.";
                        }
                            echo "</table>";
                    ?>
                                       
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>      
</html>