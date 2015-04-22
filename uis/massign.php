<?php
    
	$query1 = "SELECT * from staff";
	$query2 = "SELECT * from module 
				WHERE module_id NOT IN (SELECT distinct(3module.module_id) FROM 3module INNER JOIN module ON 3module_id=module.module_id)
				and module.course='Third Year'";
	
	$result1 = $conn->query($query1);
	$result2 = $conn->query($query2);
	
    $error1=''; // Variable To Store Error Message
    $mname = '';
    $staff = '';
    $req = '';
    $dol = '';
    
    if (isset($_POST['assignmodule'])) {
        $name = $_POST['mname'];
        $staff = $_POST['staff'];
        $req = $_POST['req'];
        $dol = $_POST['dol'];
        
        if (empty($name) || empty($staff) || empty($req) || empty($dol)) {
        $error1 = "Please fill in all the fields.";
    }
    else
    {    
    // SQL query to update information
    $query = "INSERT INTO 3module (module_id, staff_id, prereq, dayoflect)
                VALUES ('$name', '$staff', '$req', '$dol')";
        if ($conn->query($query) === TRUE) {
            header("location: module.php");
        } else {
            $error1 = "Error in assigning module";
        }
    }
    }
?>