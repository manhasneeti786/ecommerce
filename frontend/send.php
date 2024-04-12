<?php
// Establish database connection using MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $comment = $_POST["comment"];
    $added_on='';
    
    // Construct and execute the SQL query
    $sql = "INSERT INTO contact_us (name, email, mobile, comment, added_on) VALUES ('$name', '$email','$mobile','$comment','$added_on')";
    if ($conn->query($sql) === TRUE) {
        echo "Thanks for feedback";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
