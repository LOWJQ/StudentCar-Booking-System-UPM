<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order StudentCar</title>
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

      input[type="text"] {
        padding: 10px;
        font-size: 16px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
      }

      .back-button {
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

      .trip-confirmation-button {
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
      <h1>Order StudentCar</h1>
      <!-- Logout or other header options -->
    </header>

    <main>
      <!-- Destination Section -->
      <div class="container">
        <h2>Where to Go?</h2>
        <input type="hidden" name="role" value="driver" />

        <label for="Destination">Destination:</label>
        <input type="text" id="destination" name="destination" required /><br />

        <label for="CurrentLocation">Current Location:</label>
        <input
          type="text"
          id="CurrentLocation"
          name="CurrentLocation"
          required
        /><br />

        <button
          class="trip-confirmation-button"
          onclick="window.location.href='TripConfirmation.php';"
        >
          Calculate Fare
        </button>

        <button
          class="back-button"
          onclick="window.location.href='studentDashboard.php';"
        >
          Back To Home Page
        </button>
      </div>
    </main>
  </body>
</html>
