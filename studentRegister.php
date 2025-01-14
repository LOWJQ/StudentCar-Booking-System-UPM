<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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

        input {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #ff7e5f;
            color: white;
            cursor: pointer;
            padding: 12px 20px;
            font-size: 16px;
            width: 100%;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #feb47b;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: white; 
        }

        .login-link a {
            color: white; 
            text-decoration: none;
        }

        .login-link a:hover {
            color: #feb47b; 
        }
    </style>
</head>
<body>
    <h1>StudentCar Booking System UPM</h1>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="studentRegister.php" method="post">
            <label for="matricNo">Matric Number:</label>
            <input type="text" id="matricNo" name="matricNo" required>

            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="Register">Register</button>
        </form>
    </div>

    <div class="login-link">
      <p>Already have an account? <a href="studentLogin.php">Login</a></p>
  </div>
</body>
</html>

<?php 

include 'connect.php';

if (isset($_POST['Register'])) {
    $matricNo = $_POST['matricNo'];
    $studentName = $_POST['studentName'];
    $studentPhoneNO = $_POST['phone'];
    $studentPassword = $_POST['password'];

    $checkMatric = "SELECT * FROM student WHERE matricNo='$matricNo'";
    $result = $conn->query($checkMatric);

    if ($result->num_rows > 0) {
      echo "<script>alert('Matric No Already Exists!');</script>";
    } else {
        $insertQuery = "INSERT INTO student (matricNo, studentName, studentPhoneNO, studentPassword)
                        VALUES ('$matricNo', '$studentName', '$studentPhoneNO', '$studentPassword')";
        if ($conn->query($insertQuery) === TRUE) {
            header("location: studentLogin.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
