<?php
    include('session.php');
    include('conn.php');
    
    // SQL query to fetch news and announcement.
    $sql = "SELECT student.student_name, module.course, module.module_name, marks.mark
            FROM marks
                INNER JOIN module
                    ON marks.module_id=module.module_id
                INNER JOIN student
                    ON student.student_id=marks.student_id";
    
    $result = $conn->query($sql);
    $result2 = $conn->query($sql);
    $name = "";
    $course = "Bachelor of Science in Internet Computing"; 
    
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
                <div class="mark"><center>
                <h3>Student Marks</h3>
                <?php
                        if ($result->num_rows > 0) {
                        echo "<h3>".$course."</h3>";
                        echo    "<nav>                                  
                                    <a href=''>Semester 1</a> |
                                    <a href=''>Semester 2</a> |
                                    <a href=''>Semester 3</a> |
                                    <a href=''>Semester 4</a><br>
                                    <a href=''>Semester 5</a> |
                                    <a href=''>Semester 6</a> |
                                    <a href=''>Semester 7</a> |
                                    <a href=''>Semester 8</a>
                                </nav>";    
                        echo "</h3><table border='1' style='width:80%'><tr><td style='width:250px'>Name</td>";
                        while($row = $result->fetch_assoc()) {
                            $name = $row['student_name'];                        
                            echo "<td>".$row['module_name']."</td>";
                        }
                        
                        echo "</tr><tr><td>".$name."</td>";
                        while($row2 = $result2->fetch_assoc()) {

                            echo "<td>".$row2['mark']."</td>";
                        }        
                        echo "</tr></table>";
                    }
                ?>
                </div></center> `
                </div>
                <div style="float: left; width: 10%;" class="four"></div>
            </div>
        </div>
        <footer>2015 All Rights Reserved.</footer> 
    </body>
</html>