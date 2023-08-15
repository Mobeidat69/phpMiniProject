<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$mobile = $_POST['mobile'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dobDay = $_POST['dob_day'];
$dobMonth = $_POST['dob_month'];
$dobYear = $_POST['dob_year'];

// Check if the email already exists in the database
$checkEmailQuery = "SELECT email FROM users WHERE email = ?";
$stmt = $conn->prepare($checkEmailQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$checkEmailResult = $stmt->get_result();

if ($checkEmailResult->num_rows > 0) {
    echo "Error: Email already exists.";
    $stmt->close();
    $conn->close();
    header("Location: login.html"); // Redirect to login page
    exit();
}

// Insert new user data using prepared statement
$insertQuery = "INSERT INTO users (email, mobile, fname, lname, password, dob_day, dob_month, dob_year)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssssssss", $email, $mobile, $fname, $lname, $password, $dobDay, $dobMonth, $dobYear);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: login.html"); // Redirect to login page
    exit();
} else {
    echo "Error: " . $stmt->error;
    $stmt->close();
    $conn->close();
    header("Location: login.html"); // Redirect to login page
    exit();
}
?>
