<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Notifications</title>
    <style>
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff7e5f;
            padding: 20px;
            text-align: center;
            color: white;
        }

        main {
            padding: 20px;
        }

        .container {
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            color: #ff7e5f;
        }

        .notification-item {
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .notification-item:last-child {
            margin-bottom: 0;
        }

        .notification-item p {
            margin: 5px 0;
            color: #333;
        }

        .status-container {
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .status-container select {
            padding: 5px 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #ff7e5f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #feb47b;
        }

        .back-button {
            position: relative;
            background-color: white;
            color: #ff7e5f;
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #ff7e5f;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .back-button:hover {
            background-color: #ff7e5f;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Driver Notifications</h1>
    </header>

    <main>
        <div class="container">
            <h2>Ride Notifications</h2>
            <div class="notification-item">
                <p><strong>Student Name:</strong> </p>
                <p><strong>Pick-up Point:</strong> </p>
                <p><strong>Destination:</strong> </p>
                <p><strong>Fare:</strong> </p>
                <div class="status-container">
                    <span>Payment Status:</span>
                    <select id="paymentStatus2" aria-label="Payment Status for Notification 2" onchange="updatePaymentStatus(2)">
                        <option value="default" disabled selected>Select Status</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
            </div>

        </div>
        <button class="back-button" onclick="window.location.href='driverDashboard.php';">
          Back To Dashboard
        </button>
    </main>

    <script>
        function updatePaymentStatus(notificationId) {
            const dropdown = document.getElementById(`paymentStatus${notificationId}`);
            const status = dropdown.value;

            alert(`Payment status for Notification ${notificationId} updated to: ${status}`);

            if (status === "default") {
                alert("Please select a valid status.");
                return;
            }
        }
    </script>
</body>
</html>
