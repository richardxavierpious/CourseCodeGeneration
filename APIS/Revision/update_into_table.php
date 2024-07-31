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

    // Check if the record exists in the database
    $checkStmt = $conn->prepare("SELECT * FROM dept WHERE dept_id = ?");
    $checkStmt->bind_param("i", $a);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $row_count = $result->num_rows;

    if ($row_count > 0) {
        // If the record exists, update it
        $updateStmt = $conn->prepare("UPDATE dept SET dept_name = ?, dept_short = ? WHERE dept_id = ?");
        $updateStmt->bind_param("ssi", $b, $c, $a);
        if ($updateStmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $updateStmt->error;
        }
        $updateStmt->close();
    } else {
        // If the record doesn't exist, you may handle it as you need
        echo "Record does not exist";
    }
    $checkStmt->close();
}
    

// Inserting into degree table
if (strlen($degree_data["Degree Exp"]) > 1) {
    $a = $degree_data["Degree Code"];
    $b = $degree_data["Degree Exp"];
    $c = $degree_data["Degree short"];

     // Check if the record exists in the database
     $checkStmt = $conn->prepare("SELECT * FROM degree WHERE D_Code = ?");
     $checkStmt->bind_param("i", $a);
     $checkStmt->execute();
     $result = $checkStmt->get_result();
     $row_count = $result->num_rows;

     if ($row_count > 0) {
         // If the record exists, update it
         $updateStmt = $conn->prepare("UPDATE degree SET D_exp = ?, D_Short = ? WHERE D_Code = ?");
         $updateStmt->bind_param("ssi", $b, $c, $a);
         if ($updateStmt->execute()) {
             echo "Record updated successfully";
         } else {
             echo "Error updating record: " . $updateStmt->error;
         }
         $updateStmt->close();
     } 
     else {
         // If the record doesn't exist, you may handle it as you need
         echo "Record does not exist";
     }
     $checkStmt->close();
}


// Inserting into programme table
if (strlen($programme_data["Programme Name"]) > 1) {
    $a = $programme_data["Programme ID"];
    $b = $programme_data["Programme Name"];
    $c = $programme_data["Programme short"];
    $d = $programme_data["Department ID"];
    $e = $programme_data["Code"];
    $f = $programme_data["Degree ID"];

   // Check if the record exists in the database
   $checkStmt = $conn->prepare("SELECT * FROM programme WHERE Programme_ID = ?");
   $checkStmt->bind_param("i", $a);
   $checkStmt->execute();
   $result = $checkStmt->get_result();
   $row_count = $result->num_rows;

   if ($row_count > 0) {
       // If the record exists, update it
       $updateStmt = $conn->prepare("UPDATE programme SET Programme_Name = ?, prog_short = ?, dept_id = ?, code = ?, deg_id = ? WHERE Programme_ID = ?");
       $updateStmt->bind_param("ssisii", $b, $c, $d, $e, $f, $a); // Updated "ssi" to "sssiii"
       if ($updateStmt->execute()) {
           echo "Record updated successfully";
       } else {
           echo "Error updating record: " . $updateStmt->error;
       }
       $updateStmt->close();
   } else {
       // If the record doesn't exist, you may handle it as you need
       echo "Record does not exist";
   }
   $checkStmt->close();
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

     // Check if the record exists in the database
     $checkStmt = $conn->prepare("SELECT * FROM coursetype WHERE CrsTypeID = ?");
     $checkStmt->bind_param("i", $a);
     $checkStmt->execute();
     $result = $checkStmt->get_result();
     $row_count = $result->num_rows;
 
     if ($row_count > 0) {
         // If the record exists, update it
         $updateStmt = $conn->prepare("UPDATE coursetype SET CourseTypeID = ?, CourseType = ?, WorkLoad = ?, Effective_Date = ?, Description = ?, CourseTypeName = ? WHERE CrsTypeID = ?");
         $updateStmt->bind_param("ssssssi", $b, $c, $d, $e, $f, $g, $a); // Updated "ssi" to "sssiii"
         if ($updateStmt->execute()) {
             echo "Record updated successfully";
         } else {
             echo "Error updating record: " . $updateStmt->error;
         }
         $updateStmt->close();
     } else {
         // If the record doesn't exist, you may handle it as you need
         echo "Record does not exist";
     }
     $checkStmt->close();
 }


?>