<?php

/*
 * Following code will get single announcements details
 * A announcements is identified by announcements id (aid)
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["mid"])) {
    $mid = $_GET['mid'];

    // get an announcement from news table
    $result = mysql_query("Select * from 3module
							Inner Join module
								On 3module.module_id=module.module_id
							Inner Join staff
								on staff.staff_id=3module.staff_id
							where 3module.module_id=$mid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

			$mod = array();
			$mod["mid"] = $result["module_id"];
			$mod["semester"] = $result["semester"];
			$mod["info"] = $result["module_info"];
			$mod["name"] = $result["module_name"];
			$mod["confirm"] = $result["module_confirm"];	
			$mod["course"] = $result["course"];
			$mod["dol"] = $result["dayoflect"];
			$mod["lecturer"] = $result["staff_name"];
			$mod["office"] = $result["staff_room"];
            // success
            $response["success"] = 1;

            // user node
            $response["modules"] = array();

            array_push($response["modules"], $mod);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no modules found
            $response["success"] = 0;
            $response["message"] = "No modules found (1)";

            // echo no announcements JSON
            echo json_encode($response);
        }
    } else {
        // no modules found
        $response["success"] = 0;
        $response["message"] = "No modules found";

        // echo no modules JSON
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