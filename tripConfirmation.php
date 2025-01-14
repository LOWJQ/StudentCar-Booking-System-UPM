<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trip Confirmation</title>
    <style>
        body {
          background: linear-gradient(to right, #ff7e5f, #feb47b);
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
        }
  
        header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 20px;
          background-color: #ff7e5f;
          color: white;
        }
  
        header h1 {
          margin: 0;
        }
        
        .container h2 {
          color: #ff7e5f;
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
  
        input[type="text"] {
          padding: 10px;
          font-size: 16px;
          width: 100%;
          border: 1px solid #ddd;
          border-radius: 5px;
          margin-bottom: 20px;
          box-sizing: border-box;
        }
  
        .cancel-order-button {
          position: relative;
          background-color: white;
          color: #ff7e5f;
          margin-top: 20px;
          padding: 10px 20px;
          font-size: 16px;
          border: 2px solid #ff7e5f;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease, color 0.3s ease;
        }
  
        .confirm-order-button {
          position: relative;
          background-color: #ff7e5f;
          color: white;
          margin-top: 20px;
          padding: 10px 20px;
          font-size: 16px;
          border: 2px solid #ff7e5f;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease, color 0.3s ease;
        }
        </style>
  </head>
  <body>
    <header>
      <h1>Trip Confirmation</h1>
    </header>

    <main>
      <div class="container">
        <div class="details-container">
        <h2>Trip Information</h2>
        <p><strong>Driver:</strong> John</p>
        <p><strong>Phone Number:</strong> +1 234 567 890</p>
        <p><strong>Car Type:</strong> Sedan</p>
        <p><strong>Car Plate:</strong> ABC 1234</p>
        <p><strong>Destination:</strong> Institut Jantung Negara, 145, Jln Tun Razak, 50400 Kuala
          Lumpur, Wilayah Persekutuan Kuala Lumpur
        </p>
        <p>
          <strong>Current Location:</strong> Kolej Tan Sri Aishah Ghani, Jalan Maklumat, 43400
          Kajang, Selangor
        </p>
        <p><strong>Trip Fare:</strong> RM 50.00</p>
        </div>
        <button class="confirm-order-button" onclick="window.location.href='tripConfirmed.php';">
            Confirm Order
          </button>
    
          <button class="cancel-order-button" onclick="window.location.href='studentDashboard.php';">
            Cancel Order
          </button>
      </div>

    </main>
  </body>
</html>
