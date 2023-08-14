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

$sql = "INSERT INTO users (email, mobile, fname, lname, password, dob_day, dob_month, dob_year)
        VALUES ('$email', '$mobile', '$fname', '$lname', '$password', '$dobDay', '$dobMonth', '$dobYear')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: login.html"); // Redirect to login page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: login.html"); // Redirect to login page

}
$conn->close();
?>
