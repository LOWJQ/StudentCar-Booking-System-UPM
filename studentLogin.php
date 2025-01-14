<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: bold;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

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

        .register-link {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        .register-link a {
            color: white;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #feb47b;
        }
    </style>
</head>
<body>
    <h1>StudentCar Booking System UPM</h1>
    <div class="container">
        <h2>Student Login</h2>
        <form action="studentLogin.php" method="post">
            <label for="matricNo">Matriculation Number:</label>
            <input type="text" id="matricNo" name="matricNo" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <div>
                <button type="submit" name="Login">Login</button>
            </div>
            <div>
                <button type="button" onclick="window.location.href='index.php';">
                    Back To Home Page
                </button>
            </div>
        </form>
    </div>

    <div class="register-link">
        <p>Don't have an account? <a href="studentRegister.php">Create an account</a></p>
    </div>
</body>
</html>

<?php
session_start(); // Start the session
include 'connect.php';

if (isset($_POST['Login'])) {
    $matricNo = $_POST['matricNo'];
    $studentPassword = $_POST['password'];

    $checkMatric = "SELECT * FROM student WHERE matricNo='$matricNo'";
    $result = $conn->query($checkMatric);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($studentPassword === $row['studentPassword']) {
            $_SESSION['matricNo'] = $matricNo;
            header("location: studentDashboard.php");
        } else {
            echo "<script>alert('Password Incorrect!');</script>";
        }
    } else {
        echo "<script>alert('Matric No not found.');</script>";
    }
}
?>

