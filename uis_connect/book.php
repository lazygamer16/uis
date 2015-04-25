<?php
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
	
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // response Array
    $response = array("tag" => $tag, "error" => FALSE);
 
    // check for tag type
    if ($tag == 'book') {
        
        $con = $_POST['confirm'];
		$sid = $_POST['sid'];
		
		$query1 = mysql_query("Select * from student where student_id='$sid' and student_module='$con'");
		
		if (mysql_num_rows($query1) > 0){
			$response["error"] = TRUE;
			$response["error_msg"] = "You already booked a module. Please unbook it first if you wish to book this module.";
			echo json_encode($response);
		}	
		else if ($query1 == true && isset($mid) && isset ($sid)){
			$query = mysql_query("Update student SET module_confirm ='1' and student_module ='$mid' where student_id='$sid'");
			
			if ($query){
			$response["error_msg"] = "Module Booked.";
			}
			else{
			$response["error_msg"] = "Problem in running query.";
			}
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect or missing moduleid and confirm.";
            echo json_encode($response);
        }
    } else if (($tag == 'unbook')){
		
		$con = $_POST['confirm'];
		$sid = $_POST['sid'];
		
		$query2 = mysql_query("Select * from student where student_id='$sid' and module_confirm != 1");
		
		if  (mysql_num_rows($query2)>0){
			$response["error"] = TRUE;
			$response["error_msg"] = "Your module is rejected or confirmed or never booked.";
			echo json_encode($response);
		}
		
		else{
			$query3 = mysql_query("Update student SET module_confirm ='0',student_module='0' where student_id='$sid'");
			
			if ($query3){
			$response["error_msg"] = "Module Un Booked.";
			}
			else{
			$response["error_msg"] = "Problem in unbooking.";
			}
		}	
    }
	else{
		// user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        echo json_encode($response);
	}	

} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}
?>