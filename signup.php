<?php
// Database connection details
$servername = "localhost";
$username = "root";        // Change this if needed
$password = "";            // Change this if needed
$dbname = "petshelter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data from form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$pet = $_POST['pet'];

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO users (name, email, password, pet) 
        VALUES ('$name', '$email', '$hashedPassword', '$pet')";

if ($conn->query($sql) === TRUE) {
  echo "<h2 style='text-align:center; font-family:sans-serif;'>🎉 Thank you, $name!<br>Your account has been created.</h2>";
  echo "<p style='text-align:center;'><a href='login.html'>Click here to login</a></p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
