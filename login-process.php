<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    
if (password_verify($password, $row['password'])) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_fname'] = $row['fname'];
    $_SESSION['user_lname'] = $row['lname'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_mobile'] = $row['mobile'];

    // Update last login in the database
    $currentDateTime = date('Y-m-d H:i:s');
    $updateLastLoginQuery = "UPDATE users SET last_login = '$currentDateTime' WHERE id = {$row['id']}";
    $conn->query($updateLastLoginQuery);

    $response = array(
        "success" => true,
        "message" => "Login successful"
    );
    // Redirect to welcome page
    header("Location: welcome.php");
    exit();

    } else {
        $_SESSION['login_error'] = "Invalid credentials";
    }
} else {
    $_SESSION['login_error'] = "User not found";
}

$conn->close();
?>
