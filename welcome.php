<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$userFullName = $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'];
$userEmail = $_SESSION['user_email'];
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
            min-height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #f2f2f2;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 500px; /* Set a maximum width */
            margin: 0 auto; /* Center the container */
            overflow-x: auto;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #d99028;
            color: #fff;
        }
        button {
            background-color: #d99028;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ffbf00;
        }
       
        @media screen and (max-width: 600px) {
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
        <h1>Welcome<br> <?php echo $userFullName; ?>!</h1>
        <p>Your email: <?php echo $userEmail; ?></p>
        <p>Your mobile: <?php echo $userMobile; ?></p>
        <p>This is your welcome page with your user data.</p>
        <a href="logout.php"><button>Logout</button></a></p>
    </div>
</body>
</html>
