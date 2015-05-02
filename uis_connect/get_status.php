<?php

/*
 * Following code will get single news details
 * A news is identified by news id (nid)
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["sid"])) {
    $sid = $_GET['sid'];

    // get student module status
    $result = mysql_query("SELECT *
	FROM student
		INNER JOIN module
		ON student.student_module=module.module_id WHERE student.student_id=$sid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $stat = array();
            $stat["sid"] = $result["student_id"];
            $stat["mname"] = $result["module_name"];
            $stat["sname"] = $result["student_name"];
            $stat["cname"] = $result["student_course"];
			$stat["confirm"] = $result["module_confirm"];
			
            // success
            $response["success"] = 1;

            // user node
            $response["status"] = array();

            array_push($response["status"], $stat);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no status found
            $response["success"] = 0;
            $response["message"] = "No student status found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no status found
        $response["success"] = 0;
        $response["message"] = "No status 2 found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>