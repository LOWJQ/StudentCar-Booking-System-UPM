<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Method - StudentCar</title>
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
            color: #333;
            margin-top: 0;
        }

        p {
            color: #555;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Fare Payment</h2>
        <p>Fare Amount: RM <span id="fareAmount">15.00</span></p>
        <label for="paymentMethod">Choose Payment Method:</label>
        <select id="paymentMethod">
            <option value="TouchNGo">TouchNGo</option>
            <option value="Cash">Cash</option>
        </select>
        <button onclick="choosePaymentMethod()">Confirm Payment Method</button>
    </div>

    <script>
        function choosePaymentMethod() {
            const paymentMethod = document.getElementById("paymentMethod").value;
            alert(`You have selected ${paymentMethod} as your payment method.`);
            window.location.href='paymentSuccessful.php';
        }
    </script>
</body>
</html>
