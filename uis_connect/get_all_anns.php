<?php

/*
 * Following code will list all the announcements
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all announcements from announcements table
$result = mysql_query("SELECT *FROM announcement order by date_updated desc") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // announcements node
    $response["announcements"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $ann = array();
		$myinput= $row['date_updated']; 
		$sqldate=date('d-m-Y',strtotime($myinput));		
        $ann["aid"] = $row["id"];
        $ann["title"] = $row["title"];
        $ann["date_updated"] = $sqldate;
		$ann["image"] = $row["image"];

        // push single product into final response array
        array_push($response["announcements"], $ann);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no announcements found
    $response["success"] = 0;
    $response["message"] = "No announcements available.";

    // echo no announcements JSON
    echo json_encode($response);
}
?>