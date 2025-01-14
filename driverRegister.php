<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Registration</title>
    <style>
        body {
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    font-family: Arial, sans-serif;
    height: 100vh; /* Use fixed height to ensure no scrolling */
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 10px; /* Reduce padding to save space */
    box-sizing: border-box;
}

h1 {
    color: #fff;
    text-align: center;
    margin-bottom: 10px; /* Reduce margin */
    font-size: 2em; /* Slightly smaller font size */
    font-weight: bold;
}

.container {
    background-color: white;
    padding: 15px; /* Reduce padding inside the container */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 350px; /* Reduce the max width */
    text-align: center;
    box-sizing: border-box;
}

label {
    display: block;
    margin-bottom: 5px; /* Reduce margin between label and input */
    color: #333;
    font-size: 14px; /* Slightly smaller font size */
}

input, select {
    padding: 8px; /* Reduce input padding */
    font-size: 14px; /* Slightly smaller font size */
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px; /* Reduce margin between inputs */
    box-sizing: border-box;
}

button {
    background-color: #ff7e5f;
    color: white;
    cursor: pointer;
    padding: 10px; /* Slightly smaller padding */
    font-size: 14px; /* Slightly smaller font size */
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
    margin-top: 10px; /* Reduce margin */
    color: white;
    font-size: 14px; /* Slightly smaller font size */
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
        <h2>Driver Registration</h2>
        <form action="driverRegister.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="carType">Car Type:</label>
            <select id="carType" name="carType" required>
                <option value="sedan">Sedan</option>
                <option value="hatchback">Hatchback</option>
                <option value="suv">SUV</option>
                <option value="others">Others</option>
            </select>

            <label for="plateNumber">Plate Number:</label>
            <input type="text" id="plateNumber" name="plateNumber" required>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required min="1">

            <button type="submit">Register</button>
        </form>
    </div>

    <div class="login-link">
      <p>Already have an account? <a href="driverLogin.php">Login</a></p>
  </div>
</body>
</html>

<?php 

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $driverId = random_int(10000000, 99999999);
    $driverUsername = $_POST['username'];
    $driverPhoneNo = $_POST['phone'];
    $driverPassword = $_POST['password'];
    $carType = $_POST['carType'];
    $plateNum = $_POST['plateNumber'];
    $capacity = $_POST['capacity'];
    $availability = 'unavailable';

    $checkUsername = $conn->prepare("SELECT * FROM studentcardriver WHERE driverUsername = ?");
    $checkUsername->bind_param("s", $driverUsername);
    $checkUsername->execute();
    $result = $checkUsername->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username Already Exists!');</script>";
    } else {
        $insertDriver = $conn->prepare("INSERT INTO studentcardriver (driverId, driverUsername, driverPhoneNo, driverPassword, availability) VALUES (?, ?, ?, ?, ?)");
        $insertDriver->bind_param("issss", $driverId, $driverUsername, $driverPhoneNo, $driverPassword, $availability);

        $insertCar = $conn->prepare("INSERT INTO car (driverId, carType, plateNum, capacity) VALUES (?, ?, ?, ?)");
        $insertCar->bind_param("issi", $driverId, $carType, $plateNum, $capacity);

        if ($insertDriver->execute() && $insertCar->execute()) {
            header("Location: driverLogin.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $checkUsername->close();
    $insertDriver->close();
    $insertCar->close();
    $conn->close();
}
?>


