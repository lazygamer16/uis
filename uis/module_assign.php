<?php    
    include('session.php');
    include('conn.php');
    include('massign.php');
    
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
                    <h3>Assign ExperiencePLUS Module</h3>
                    <div id="addmodule">        
                        <form action="" method="post">
                            Module Name:<br><select name='mname'>
										<?php
										if ($result2->num_rows > 0) {
											while($row4 = $result2->fetch_assoc()) {
											echo "<option value='".$row4['module_id']."'>".$row4['module_name']."</option>";
											}
										}
										else{
											echo "<option value='0'>No Modules Available.</option>";
										}
										?>
										</select><br>
                            Staff:<br><select name='staff'>
								  <?php
								  if ($result1->num_rows > 0) {
									while($row3 = $result1->fetch_assoc()) {
									echo "<option value='".$row3['staff_id']."'>".$row3['staff_name']."</option>";
									}
								  }
								  ?>
								  </select><br>
                            Pre-requisite:<input name="req" type="text" placeholder="Engineering Course"><br>
							Date of Lecture:<input name="dol" type="text" placeholder="Sunday 10am-1pm">
                            <input name="assignmodule" type="submit" value="Assign Module">
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