<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$userEmail = $_SESSION['user_email'];
$fullName = $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'];
$userMobile = $_SESSION['user_mobile'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="shortcut icon" type="image/x-icon" href="04f76696b55c45ed855a64af7a069a49.png" />
    <style>
        body {
            background-color: #11171f;
            color: #000000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #f2f2f2;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        h1 {
            color: #d99028;
            margin-top: 0;
        }
        p {
            font-size: 18px;
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
           /* Style for the Logout button */
           .logout-btn {
            background-color: #d99028;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #ffbf00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="04f76696b55c45ed855a64af7a069a49.png" alt="Site Logo">
        <h1>Welcome, <?php echo $fullName; ?>!</h1>
        <p>Your email: <?php echo $userEmail; ?></p>
        <p>Your mobile: <?php echo $userMobile; ?></p>
        <p>This is your welcome page with your user data.</p>
        <p><a href="logout.php" class="logout-btn">Log Out</a></p>    </div>
</body>
</html>
