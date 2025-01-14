<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Login</title>
    <style>
        /* Set a gradient background */
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* Same colors as student login */
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        /* Styling the global heading */
        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: bold;
        }

        /* Styling the container */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Styling the form labels and inputs */
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 16px;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
            margin-top: 20px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #ff7e5f;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #feb47b;
        }

        /* Styling the "Don't have an account?" section */
        .register-link {
        text-align: center;
        margin-top: 20px;
        color: white; /* Changed text color to white */
        }

        .register-link a {
            color: white; /* Link color also changed to white */
            text-decoration: none;
        }

        .register-link a:hover {
            color: #feb47b; /* Optional: Add a hover effect for the link */
        }
    </style>
</head>
<body>
    <!-- Global Heading -->
    <h1>StudentCar Booking System UPM</h1>

    <div class="container">
        <h2>Driver Login</h2>
        <form action="driverLogin.php" method="post">
            <input type="hidden" name="role" value="driver">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit" name="Login">Login</button>
            
            <button onclick="window.location.href='index.php';">
              Back To Home Page
            </button>
        </form>
    </div>

    <div class="register-link">
        <p>Don't have an account? <a href="driverRegister.php">Create an account</a></p>
    </div>
</body>
</html>

<?php
session_start(); // Start the session
include 'connect.php';

if (isset($_POST['Login'])) {
    $Username = $_POST['username'];
    $driverPassword = $_POST['password'];

    $checkUsername = "SELECT * FROM studentcardriver WHERE driverUsername='$Username'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($driverPassword === $row['driverPassword']) {
            $_SESSION['driverId'] = $row['driverId']; 
            header("location: driverDashboard.php");
        } else {
            echo "<script>alert('Password Incorrect!');</script>";
        }
    } else {
        echo "<script>alert('Username not found.');</script>";
    }
}

?>
