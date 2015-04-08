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
    $result = mysql_query("SELECT * FROM news WHERE id = $nid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $news = array();
            $news["nid"] = $result["id"];
            $news["title"] = $result["title"];
			$result["description"]=utf8_encode($result["description"]);
            $news["description"] = $result["description"];
            $news["image"] = $result["image"];
            $news["date_create"] = $result["date_create"];
            $news["date_updated"] = $result["date_updated"];
            // success
            $response["success"] = 1;

            // user node
            $response["news"] = array();

            array_push($response["news"], $news);

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