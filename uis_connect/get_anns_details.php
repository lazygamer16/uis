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
if (isset($_GET["aid"])) {
    $aid = $_GET['aid'];

    // get an announcement from news table
    $result = mysql_query("SELECT *FROM announcement WHERE id = $aid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

			$ann = array();
			$myinput= $result['date_updated']; 
			$sqldate=date('d-m-Y',strtotime($myinput));	
			$ann["nid"] = $result["id"];
			$ann["title"] = $result["title"];
			$ann["time"] = $result["time"];
			$ann["venue"] = $result["venue"];
			$result["description"]=utf8_encode($result["description"]);
			$ann["description"] = strip_tags($result["description"]);
			$ann["link"] = $result["link"];
			$ann["date_updated"] = $sqldate;
			$ann["image"] = $result["image"];
            // success
            $response["success"] = 1;

            // user node
            $response["announcements"] = array();

            array_push($response["announcements"], $ann);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no announcements found
            $response["success"] = 0;
            $response["message"] = "No news found";

            // echo no announcements JSON
            echo json_encode($response);
        }
    } else {
        // no announcements found
        $response["success"] = 0;
        $response["message"] = "No announcements found";

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