<?php
session_start(); 
include 'connect.php';

if (!isset($_SESSION['driverId'])) {
    header("location: driverLogin.php");
}

$driverId = $_SESSION['driverId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
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
        }

        main {
            padding: 20px;
        }

        .container {
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            color: #ff7e5f;
        }

        button {
            position: relative;
            background-color: white;
            color: #ff7e5f;
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #ff7e5f;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #ff7e5f;
            color: white;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }

        .driver-info, .ride-history {
            margin-top: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .driver-info h2, .ride-history h2 {
            color: #ff7e5f;
        }

        .toggle-availability-button {
            margin-top: 20px;
            background-color: white; /* Default: "Available" color */
            color: #ff7e5f;
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #ff7e5f;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }
    </style>
</head>
<body>
    <header>
        <h1>Driver Dashboard</h1>
    </header>

    <main>
        <div class="driver-info">
            <h2>Driver Information</h2>
            <p><strong>Driver Name:</strong>
                <?php 
                    $stmt = $conn->prepare("SELECT driverUsername FROM `studentcardriver` WHERE driverId = ?");
                    $stmt->bind_param("s", $driverId);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['driverUsername']); 
                    } else {
                        echo "Driver not found.";
                    }
                    $stmt->close();
                ?>             
            </p>
            <p><strong>Phone Number:</strong> +60
                <?php 
                    $stmt = $conn->prepare("SELECT driverPhoneNo FROM `studentcardriver` WHERE driverId = ?");
                    $stmt->bind_param("s", $driverId);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['driverPhoneNo']); 
                    } else {
                        echo "Driver not found.";
                    }
                    $stmt->close();
                ?>               
            </p>
            <p><strong>Car Type:</strong> 
                <?php 
                    $stmt = $conn->prepare("SELECT carType FROM `car` WHERE driverId = ?");
                    $stmt->bind_param("s", $driverId);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['carType']); 
                    } else {
                        echo "Car not found.";
                    }
                    $stmt->close();
                ?>     
            </p>
            <p><strong>Car Plate Number:</strong> 
                <?php 
                    $stmt = $conn->prepare("SELECT plateNum FROM `car` WHERE driverId = ?");
                    $stmt->bind_param("s", $driverId);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['plateNum']); 
                    } else {
                        echo "Car not found.";
                    }
                    $stmt->close();
                ?>     
            </p>
            <p><strong>Car Capacity:</strong> 
                <?php 
                    $stmt = $conn->prepare("SELECT capacity FROM `car` WHERE driverId = ?");
                    $stmt->bind_param("s", $driverId);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['capacity']); 
                    } else {
                        echo "Car not found.";
                    }
                    $stmt->close();
                ?>    
            </p>
        </div>

        <div class="ride-history">
            <h2>Ride History</h2>
            <p>Manage your past rides and current assignments.</p>
        </div>
        
        <button class="toggle-availability-button" onclick="toggleAvailability('<?php echo $driverId; ?>')">
            <?php 
            $stmt = $conn->prepare("SELECT availability FROM `studentcardriver` WHERE driverId = ?");
            $stmt->bind_param("s", $driverId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                echo htmlspecialchars(strtoupper($row['availability']));
            } else {
                echo "Driver not found.";
            }
            $stmt->close();
            ?>
        </button>
        
            <button onclick="window.location.href='notification.php';">
                Ride Notifications
            </button>

            <button onclick="window.location.href='index.php';">
            Logout
            </button>
    </main>

    <script>
        function toggleAvailability(driverId) {
            fetch('toggleAvailability.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ driverId: driverId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const button = document.querySelector('.toggle-availability-button');
                    button.textContent = data.newAvailability.toUpperCase();
                    alert(`Availability changed to: ${data.newAvailability}`);
                } else {
                    alert('Failed to toggle availability: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        }


    </script>
</body>
</html>
