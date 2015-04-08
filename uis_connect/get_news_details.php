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
if (isset($_GET["nid"])) {
    $nid = $_GET['nid'];

    // get a news from news table
    $result = mysql_query("SELECT *FROM products WHERE id = $nid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

			$new = array();
			$new["nid"] = $result["id"];
			$new["title"] = $result["title"];
			$result["description"]=utf8_encode($result["description"]);
			$new["description"] = $result["description"];
			$new["date_create"] = $result["date_create"];
			$new["date_updated"] = $result["date_updated"];
			$new["image"] = $result["image"];
            // success
            $response["success"] = 1;

            // user node
            $response["news"] = array();

            array_push($response["news"], $new);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No news found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No news found";

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