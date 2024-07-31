<?php

header("Access-Control-Allow-Origin: *"); // Specify the allowed origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "eric_db";

// Establishing the connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = json_decode(file_get_contents("php://input"), true);

// Accessing the array elements directly
$degree_data = $data[0];
$dept_data = $data[1];
$programme_data = $data[2];
$coursetype_data = $data[3];


// Inserting into dept table
if (strlen($dept_data["Department Name"]) > 1) {
    $a = $dept_data["Department ID"];
    $b = $dept_data["Department Name"];
    $c = $dept_data["Department Short"];

    // Prepare the INSERT statement with placeholders
    $stmt = $conn->prepare("INSERT INTO dept (dept_id, dept_name, dept_short) VALUES (?, ?, ?)");
    // Bind parameters to the statement
    $stmt->bind_param("iss", $a, $b, $c); // Assuming D_Code is an integer, D_exp and D_Short are strings

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close the statement 
    $stmt->close();
    }
    
// Inserting into degree table
if (strlen($degree_data["Degree Exp"]) > 1) {
    $a = $degree_data["Degree Code"];
    $b = $degree_data["Degree Exp"];
    $c = $degree_data["Degree short"];

    // Prepare the INSERT statement with placeholders
    $stmt = $conn->prepare("INSERT INTO degree (D_Code, D_exp, D_Short) VALUES (?, ?, ?)");
    // Bind parameters to the statement
    $stmt->bind_param("iss", $a, $b, $c); // Assuming D_Code is an integer, D_exp and D_Short are strings

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close the statement
    $stmt->close();
    }

// Inserting into programme table
if (strlen($programme_data["Programme Name"]) > 1) {
    $a = $programme_data["Programme ID"];
    $b = $programme_data["Programme Name"];
    $c = $programme_data["Programme short"];
    $d = $programme_data["Department ID"];
    $e = $programme_data["Code"];
    $f = $programme_data["Degree ID"];

    // Prepare the INSERT statement with placeholders
    $stmt = $conn->prepare("INSERT INTO programme (Programme_ID, Programme_Name, prog_short, dept_id, code, deg_id ) VALUES (?, ?, ?, ?, ?, ?)");
    // Bind parameters to the statement
    $stmt->bind_param("issisi", $a, $b, $c, $d, $e, $f); // Assuming D_Code is an integer, D_exp and D_Short are strings

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close the statement 
    $stmt->close();
    }

// Inserting into coursetype table
if (strlen($coursetype_data["Course Type ID"]) > 1) {
    $a = $coursetype_data["CrsTypeId"];
    $b = $coursetype_data["Course Type ID"];
    $c = $coursetype_data["Course Type"];
    $d = $coursetype_data["Work Load"];
    $e = $coursetype_data["Effective Date"];
    $f = $coursetype_data["Description"];
    $g = $coursetype_data["Course Type Name"];

    // Prepare the INSERT statement with placeholders
    $stmt = $conn->prepare("INSERT INTO coursetype (CrsTypeID, CourseTypeID, CourseType, WorkLoad, Effective_Date, Description, CourseTypeName ) VALUES (?, ?, ?, ?, ?, ?, ?)");
    // Bind parameters to the statement
    $stmt->bind_param("issssss", $a, $b, $c, $d, $e, $f, $g); // Assuming D_Code is an integer, D_exp and D_Short are strings

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close the statement 
    $stmt->close();
    }

?>