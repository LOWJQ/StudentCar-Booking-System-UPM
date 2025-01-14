<?php
include 'connect.php';

$stmt = $conn->prepare("
    SELECT 
        studentcardriver.driverId,
        studentcardriver.driverUsername,
        studentcardriver.driverPhoneNo,
        car.carType,
        car.plateNum AS carPlate,
        car.capacity AS carCapacity
    FROM 
        studentcardriver
    INNER JOIN 
        car 
    ON 
        studentcardriver.driverId = car.driverId
    WHERE 
        studentcardriver.availability = 'available'
");

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Driver</title>
    <style>
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff7e5f;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 600;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            font-size: 1.5rem;
            color: #ff7e5f;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .container p {
            font-size: 1rem;
            margin: 10px 0;
            color: #555;
        }

        .driver-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .driver-item button {
            background-color: #ff7e5f;
            color: white;
            padding: 10px 15px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }

        .driver-item button:hover {
            background-color: #feb47b;
            transform: scale(1.05);
        }

        .button{
            display: block;
            background: white;
            color: #ff7e5f;
            padding: 15px 20px;
            font-size: 1rem;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            max-width: 400px;
            margin: 10px auto;
            transition: transform 0.2s, background-color 0.3s;
            text-decoration: none;
        }
        
        .button:hover{
            background-color: #ff7e5f;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <header>
        <h1>Choose Your Driver</h1>
    </header>

    <main>
        <div class="container driver-list">
            <h2>Select a Driver for Your Ride</h2>
            <p>Choose a driver that suits your ride preferences:</p>

            <?php
            if ($result->num_rows > 0) {
                // Loop through available drivers and display them
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="driver-item">';
                    echo '<div>';
                    echo '<p><strong>Name:</strong> ' . htmlspecialchars($row['driverUsername']) . '</p>';
                    echo '<p><strong>Phone Number:</strong> +60'. htmlspecialchars($row['driverPhoneNo']) . '</p>';
                    echo '<p><strong>Car Type:</strong> ' . htmlspecialchars($row['carType']) . '</p>';
                    echo '<p><strong>Car Plate:</strong> ' . htmlspecialchars($row['carPlate']) . '</p>';
                    echo '<p><strong>Car Capacity:</strong> ' . htmlspecialchars($row['carCapacity']) . ' passengers</p>';
                    echo '</div>';
                    echo '<button onclick="chooseDriver(\'' . htmlspecialchars($row['driverId']) . '\')">Choose</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No available drivers at the moment.</p>';
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>

        <button class="button" onclick="window.location.href='studentDashboard.php';">Back to Dashboard</button>
        <button class="button" onclick="window.location.href='index.php';">Logout</button>
    </main>

    <script>
        function chooseDriver(driverId) {
            alert("You have chosen driver ID: " + driverId + " for your ride.");
            window.location.href = `tripOrder.php?driverId=${encodeURIComponent(driverId)}`;
        }
    </script>
</body>
</html>
