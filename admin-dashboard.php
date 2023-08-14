<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="04f76696b55c45ed855a64af7a069a49.png" />
    <style>
        body {
            background-color: #11171f;
            color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #f2f2f2;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 1200px; /* Set a maximum width */
            margin: 20px auto; /* Add margin for better spacing */
            overflow-x: auto;
        }
        h1 {
            color: #d99028;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            color: #000000;
        }
        th {
            background-color: #d99028;
            color: #fff;
        }
        a {
            color: #ffdf26;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .logo {
            display: block;
            margin: auto;
            margin-top: 20px;
            max-width: 150px;
        }
        @media screen and (max-width: 960px) {
            .container {
                width: 90%; /* Adjust the width for smaller screens */
            }
            table {
                font-size: 14px; /* Adjust font size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="04f76696b55c45ed855a64af7a069a49.png" alt="Site Logo">
        <h1>Admin Dashboard</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Date Created</th>
                <th>Last Login</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['last_login']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
