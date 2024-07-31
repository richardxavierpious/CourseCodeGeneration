<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

header("Access-Control-Allow-Origin: *");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $postData = file_get_contents("php://input");
    $data = json_decode($postData, true);

    $a = $data["D_Code"];
    $b = $data["D_exp"];
    $c = $data["D_Short"];

    // Prepare the INSERT statement with placeholders
    $stmt = $conn->prepare("INSERT INTO degree (D_Code, D_exp, D_Short) VALUES (?, ?, ?)");
    // Bind parameters to the statement
    $stmt->bind_param("iss", $a, $b, $c); // Assuming D_Code is an integer, D_exp and D_Short are strings

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}else {
    // Handle invalid request method
    echo "Error: Invalid request method";
}
?>