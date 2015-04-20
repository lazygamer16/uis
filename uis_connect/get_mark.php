<?php

/*
 * Following code will list a student mark
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

if (isset($_GET["mkid"])) {
    $mkid = $_GET['mkid'];

	// get a student marks from a student table
	$result = mysql_query("SELECT module.module_name, marks.mark, marks.marks_id
							FROM marks
								INNER JOIN module
									ON marks.module_id=module.module_id
								INNER JOIN student
									ON student.student_id=marks.student_id
								where student.student_id='$mkid'");

	if (!empty($result)) {
							
		// check for empty result
		if (mysql_num_rows($result) > 0) {
			// looping through all results
			// marks node
			$response["marks"] = array();
			
			while ($row = mysql_fetch_array($result)) {
				// temp user array
				$mark = array();
				$mark["mkid"]= $row["marks_id"];
				$mark["name"] = $row["module_name"];
				$mark["mark"] = $row["mark"];
			  
				// push single product into final response array
				array_push($response["marks"], $mark);
			}
			// success
			$response["success"] = 1;

			// echoing JSON response
			echo json_encode($response);
		} else {
				// no marks found
				$response["success"] = 0;
				$response["message"] = "No marks 1 available.";

				// echo no announcements JSON
				echo json_encode($response);
			}
	} else {
    // no marks found
    $response["success"] = 0;
    $response["message"] = "No marks 2 available.";

    // echo no announcements JSON
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