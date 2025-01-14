<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - StudentCar</title>
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

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #ff7e5f;
            margin-top: 0;
        }

        p {
            color: #555;
            margin: 10px 0;
        }

        .receipt {
            text-align: left;
            background: #f9f9f9;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #ff7e5f;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #feb47b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Successful!</h2>
        <p>Thank you for your payment. Here are the details of your transaction:</p>
        <div class="receipt">
            <p><strong>Order Details:</strong> Destination A to Destination B</p>
            <p><strong>Fare Amount:</strong> RM 15.00</p>
            <p><strong>Payment Method:</strong> TouchNGo</p>
            <p><strong>Driver Name:</strong> John Doe</p>
            <p><strong>Car Model:</strong> Toyota Vios</p>
            <p><strong>Car Plate:</strong> ABC 1234</p>
        </div>
        <button onclick="goBack()">Back to Home</button>
    </div>

    <script>
        function goBack() {
            window.location.href = "studentDashboard.php"; 
        }
    </script>
</body>
</html>
