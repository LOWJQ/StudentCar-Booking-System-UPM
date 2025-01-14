<?php
session_start(); 
include 'connect.php';

if (!isset($_SESSION['matricNo'])) {
    header("location: studentLogin.php");
    exit;
}

$matricNo = $_SESSION['matricNo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
            flex: 1;
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
        <h1>Student Dashboard</h1>
    </header>

    <main>
        <!-- Student Information Section -->
        <div class="container">
        <h2>Student Information</h2>
            <p><strong>Name:</strong> 
                <?php 
                    $stmt = $conn->prepare("SELECT studentName FROM student WHERE matricNo = ?");
                    $stmt->bind_param("s", $matricNo);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['studentName']); 
                    } else {
                        echo "Student not found.";
                    }
                    $stmt->close();
                ?>
            </p>
            <p><strong>Phone Number:</strong> +60
                <?php 
                    $stmt = $conn->prepare("SELECT studentPhoneNo FROM student WHERE matricNo = ?");
                    $stmt->bind_param("s", $matricNo);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['studentPhoneNo']); 
                    } else {
                        echo "Student not found.";
                    }
                    $stmt->close();
                ?>
            </p>
            <p><strong>Matriculation Number:</strong>
            <?php 
                    $stmt = $conn->prepare("SELECT matricNo FROM student WHERE matricNo = ?");
                    $stmt->bind_param("s", $matricNo);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['matricNo']); 
                    } else {
                        echo "Student not found.";
                    }
                    $stmt->close();
                ?>             
            </p>
        </div>
        
        <div class="container">
            <h2>Ride History</h2>
            <p>Review your past and current rides:</p>
        </div>
        
        <button class="button" onclick="window.location.href='chooseDriver.php';">
            Select a Driver for Your Ride
        </button>

        <button class="button" onclick="window.location.href='index.php';">
          Logout
        </button>
    </main>
</body>
</html>
