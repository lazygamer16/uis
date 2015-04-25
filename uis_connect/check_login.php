<?php
 
/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data
 
  /**
 * check for POST request 
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
 
    // include db handler
    require_once 'db_functions.php';
    $db = new DB_Functions();
 
    // response Array
    $response = array("tag" => $tag, "error" => FALSE);
 
    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $email = $_POST['email'];
        $password = $_POST['password'];
 
        // check for user
        $user = $db->getUserByEmailAndPassword($email, $password);
        if ($user != false) {
			if ($user["user_id"] == 1){
				$response["error"] = TRUE;
				$response["error_msg"] = "User has already logged in.";
				echo json_encode($response);
			}
			else{
			$result3 = mysql_query("UPDATE user SET login = '1' WHERE user_name = '$email' and user_pass='$password'");
            // user found
            $response["error"] = FALSE;
            $response["uid"] = $user["user_id"];
			$response["sid"] = $user["student_id"];
			$response["confirm"] = $user["module_confirm"];
            $response["user"]["name"] = $user["student_name"];
            $response["user"]["email"] = $user["user_name"];
            echo json_encode($response);
			}
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password! or User has already logged in";
            echo json_encode($response);
        }
    } else {
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