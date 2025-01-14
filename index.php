<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Role - StudentCar Booking System</title>
    <style>
        /* Set a gradient background */
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* You can adjust the colors here */
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Stack the headings and container */
        }

        /* Styling the global heading outside the container */
        h1 {
            color: #fff; /* White color for the main heading */
            text-align: center;
            margin-bottom: 20px; /* Space between the heading and the form */
            font-size: 2.5em;
            font-weight: bold;
        }

        /* Styling the container for the form */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Limit the width */
            text-align: center;
        }

        /* Styling the second heading for the "Choose Role" text */
        h2 {
            color: #333;
            margin-top: 0;
        }

        /* Styling the select box and button */
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
    <h1>StudentCar Booking System UPM</h1>
    <div class="container">
        <h2>Select Your Role</h2>
        <p>Please choose whether you are a student or a driver to proceed.</p>
        <form id="roleForm" action="studentLogin.php" method="post" onsubmit="changeAction(event)">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Student">Student</option>
                <option value="Driver">Driver</option>
            </select>
            <button type="submit">Next</button>
        </form>
    </div>

    <script>
        function changeAction(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the selected role
            const role = document.getElementById("role").value;

            // Set the form's action dynamically based on the selected role
            const form = document.getElementById("roleForm");
            if (role === "Student") {
                form.action = "studentLogin.php";
            } else if (role === "Driver") {
                form.action = "driverLogin.php";
            }

            // Submit the form
            form.submit();
        }
    </script>
</body>
</html>
