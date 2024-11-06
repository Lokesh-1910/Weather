
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "weather"; // Your database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$registration_successful = false;

$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$retypePassword = $_POST["Retypepassword"];

// Check if password and retype password match
if ($password === $retypePassword) {
   

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL to insert user data
    $sql = "INSERT INTO register (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $registration_successful = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Passwords do not match, display an alert
    echo "<script>alert('Password and re-type password do not match!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <style>
        /* Styles for message container */
        body {
            font-family: Arial, sans-serif;
            background: url('Clouds.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
            width: 400px;
            text-align: center;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
            display: inline-block;
        }
        .message {
            font-size: 1.2em;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php if ($registration_successful): ?>
            <p class="message">Registration Successful!</p>
            <p>Welcome to the Weather App! You can now log in to stay updated with the latest weather forecasts tailored just for you.</p>
            <?php else: ?>
            <p class="message">Registration failed. Please try again.</p>
        <?php endif; ?>
        <a href="login.html" class="button">Back to Login</a>
    </div>
</body>
</html>