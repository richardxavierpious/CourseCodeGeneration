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

$query = "SELECT Revision_ID FROM revision ORDER BY Revision_ID DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$Revision_ID = ($row['Revision_ID']);


$query_table = "SELECT CourseID,CourseName,CourseCode,CourseLecture,CourseTutorial,CoursePractical,CourseCredits,WklyHrs from course  WHERE SUBSTRING(CourseCode, 2, 3) LIKE '$Revision_ID%'";
$result_table = mysqli_query($conn, $query_table);

if (!$result_table) {
die("Query failed: " . mysqli_error($conn));
}

$data = mysqli_fetch_all($result_table, MYSQLI_ASSOC);
$jsondata = json_encode($data);
echo $jsondata;

?>