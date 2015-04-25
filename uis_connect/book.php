<?php

if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
	$sid = $_POST['sid'];
	
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	
	$query1 = mysql_query("Select * from student where student_id='$sid'");
		
		while ($row = mysql_fetch_array($query1)) {
			$module = $row['student_module'];
			$confirm = $row['module_confirm'];	
			}
			
    // response Array
    $response = array("tag" => $tag, "error" => FALSE);
 
    // check for tag type
    if ($tag == 'book') {
		$mid = $_POST['mid'];
        	
		if ($confirm == 1){
			$response["error"] = TRUE;
			$response["error_msg"] = "You already booked a module. Please unbook it first if you wish to book this module.";
			echo json_encode($response);
		}
		else if ($confirm == 2){
			$response["error"] = TRUE;
			$response["error_msg"] = "Your module has been approved. You cannot book it again.";
			echo json_encode($response);
		}	
		else if ($confirm == 3 || $confirm == 0){
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
            $response["error_msg"] = "Incorrect or missing module id.";
            echo json_encode($response);
        }
    } else if ($tag == 'unbook'){
			
		if  ($confirm == 3){
			$response["error"] = TRUE;
			$response["error_msg"] = "Your module is rejected therefore it cannot be unbooked.";
			echo json_encode($response);
		}
		
		else if  ($confirm == 2){
			$response["error"] = TRUE;
			$response["error_msg"] = "Your module is approved. Please consult the admin if you wish to change it.";
			echo json_encode($response);
		}
		
		else if  ($confirm == 0){
			$response["error"] = TRUE;
			$response["error_msg"] = "Your did not book any modules.";
			echo json_encode($response);
		}
		
		else if ($confirm == 1){
			$query3 = mysql_query("Update student SET module_confirm ='0',student_module='0' where student_id='$sid'");
			
			if ($query3){
			$response["error_msg"] = "Module Un Booked.";
			}
			else{
			$response["error_msg"] = "Problem in unbooking.";
			}
		}
		else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect or missing module id(2).";
            echo json_encode($response);
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