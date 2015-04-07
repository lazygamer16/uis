<?php
    
    $error1=''; // Variable To Store Error Message
    $name = '';
    $course = '';
    $info = '';
    $sem = '';
    
    if (isset($_POST['addmodule'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $info = $_POST['info'];
        $sem = $_POST['sem'];
        
        if (empty($name) || empty($course) || empty($info) || empty($sem)) {
        $error1 = "Please fill in all the fields.";
    }
    else
    {    
    // SQL query to update information
    $query = "INSERT INTO module (module_name, module_info, course, semester)
                VALUES ('$name', '$info', '$course', '$sem')";
        if ($conn->query($query) === TRUE) {
            header("location: module.php");
        } else {
            $error1 = "Error in adding module";
        }
    }
    }
?>