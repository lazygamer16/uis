<?php
    include('session.php');
    include('conn.php');
	
	if (!isset($_GET['sem'])){
		$semester = '1';
	}
	else if (isset($_GET['sem'])){
		$semester = $_GET['sem'];
	}
    
    // SQL query to fetch news and announcement.
    $sql = "SELECT DISTINCT student_name from student where student_course='Bachelor of Science in Internet Computing'";
	$sql2 = "SELECT student.student_name, module.course, module.module_name, marks.mark
            FROM marks
                INNER JOIN module
                    ON marks.module_id=module.module_id
                INNER JOIN student
                    ON student.student_id=marks.student_id where module.semester='$semester' order by student.student_name";		
	$sql3 = "SELECT module_name from module where semester = '$semester' and course='Bachelor of Science in Internet Computing'";					
	
    $result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
	
	$secretnumber = mysqli_num_rows($result3);
	echo $secretnumber;
	
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
					echo $course;
                    echo "<nav>                                  
							<a href='?sem=1'>Semester 1</a> | <a href='?sem=2'>Semester 2</a>
                          </nav>";
						$student= array();
						$i=0;
                        while ($row = $result->fetch_assoc()) {
						$student[$i][0] = $row['student_name'];
						$i++;
						}
						$j=0;
						$k=1;
						while ($row2 = $result2->fetch_assoc()) {
						$student[$j][$k] = $row2['mark'];
						$k++;
						if ($k==($secretnumber+1)){
						$k=1;$j++;
						}
						}
						echo "<table border='1' style='width:80%'><tr><td style='width:250px'>Name</td>";
                        while($row3 = $result3->fetch_assoc()) {                   
                            echo "<td>".$row3['module_name']."</td>";
                        }
						for ($x = 0; $x < 3; $x++)
							{	echo "<tr>";
								for ($y = 0; $y < ($secretnumber+1); $y++)
										{
										echo  "<td>".$student[$x][$y]."</td>";
										}
								echo "<tr>";
						}
						echo "<table>";
                ?>
                </div></center>
                </div>
            </div>	
        </div>
    </body>
</html>